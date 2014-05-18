<?php

/** ImageDbProcessor model
 *
 *	Has methods which help adding sugnlasses images to db from folder; methods to create miniatures (thumbnails) etc.
 */
class ImageDbProcessor extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/** resize method
	 *
	 *	Resizes images from folder specified in config section of method and saves them to './pub'.
	 */
	public function resize($model, $height) {
		// config
		$folder = 'images/'.$model.'/'; // folder path WITH trailing slash!
		$outputHeight = $height;

		// include resize_image function, which I copied from stackoverflow
		include 'resources/resize_image.php';

		$imagePaths = $this->getImagePaths($folder);

		// resize and save images
		foreach($imagePaths as $imagePath) {
			list($width, $height) = getimagesize($imagePath);
			$image = resize_image($imagePath, $width, $outputHeight); // old image width is passed to resize function, but it preserves ratio anyway
			// save image
			$newImagePath = './pub/'.end(explode('/', $imagePath));
			imagejpeg($image, $newImagePath);
		}
	}

	/** createMiniaturesUsingCrop method
	 *	
	 *	Crops and resizes images from folder specified in config section of this method.
	 *	Saves modified images to './pub' directory.
	 */
	public function cropAndResize($model, $height) {
		//config
		$cropRect = array(
			'x' => 0,
			'y' => 0,
			'width' => 737,
			'height' => 300
		);
		$outputHeight = $height;

		$folder = 'images/'.$model.'/';

		// include resize_image function, which I copied from stackoverflow
		include 'resources/resize_image.php';

		$imagePaths = $this->getImagePaths($folder);

		foreach($imagePaths as $imagePath) {
			$image = imagecreatefromjpeg($imagePath);
			list($width, $height) = getimagesize($imagePath);


			// crop image		
			$image = imagecrop($image, $cropRect);

			$oldImageName = end(explode('/', $imagePath));
			$newImagePath = './pub/'.$oldImageName;
			// save cropped image
			imagejpeg($image, $newImagePath); 
			// now resize saved image and resave it (don't know a work around to save the image only once :) )
			$image = resize_image($newImagePath, $width, $outputHeight); // old image's width is passed, but the function saves ratio anyway
			imagejpeg($image, $newImagePath);
		}
	}

	/** addToDbByImages method 
	 *	Adds sunglasses to database by images located in folder, specified in config section of this method.
	 *	Reads folder named '$folder', generates pathes to all the images in this folder, and creates new sunglasses in database with these image pathes.
	 *	Also adds newly added sunglasses will have model name filled with model name specified in '$model' variable of config section of this method.
	 */
	public function addToDbByImages() {
		// config
		$folder = 'images/flynn/';
		$model = 'Flynn';

		// get image pathes
		$this->load->helper('directory');

		$imageNames = directory_map('./'.$folder);
		foreach($imageNames as $imageName) {
			if(is_string($imageName)) {
				$imagePaths[] = $folder.$imageName;
			}
		}

		foreach($imagePaths as $imagePath) {
			$sql = "INSERT INTO sunglasses (model, img_path) VALUES ('".$model."', '".$imagePath."')";		
			$this->db->query($sql);
		}
	}

	/** addMiniatures method 
	 *	Updates DB with pathes of miniature images (sets 'mini_img_path'). Miniature names must be the same as original image names.
	 *
	 *	@param $model name of folder (model), where original full-size images located. Exapmles: kenBlockHelm, flynn.
	 *	@param $subfolder name of subfolder, where miniature images located.
	 */
	public function addMiniatures($model, $subfolder) {
		// config
		$folder = 'images/'.$model.'/';
		$folderMini = $folder.$subfolder.'/';

		// get image paths
		$this->load->helper('directory');

		$imageNames = directory_map('./'.$folderMini);

		$i=0;
		foreach($imageNames as $imageName) {
			$imagePaths[$i]['mini'] = $folderMini.$imageName;
			$imagePaths[$i]['original'] = $folder.$imageName;
			$i++;
		}

		foreach($imagePaths as $imagePath) {
			$sql = "UPDATE sunglasses SET mini_img_path = '".$imagePath['mini']."' WHERE img_path='".$imagePath['original']."'";		
			echo $sql."<br />";
			$this->db->query($sql);
		}
	}

	/** addThumbnails method 
	 *	Updates DB with pathes of thumbnails images (sets 'thumbnail_img_path'). Miniature names must be the same as original image names.
	 *
	 *	@param $model name of folder (model), where original full-size images located. Exapmles: kenBlockHelm, flynn.
	 *	@param $subfolder name of subfolder, where thumbnail images located.
	 */
	public function addThumbnails($model, $subfolder) {
		// config
		$folder = 'images/'.$model.'/';
		$folderMini = $folder.$subfolder.'/';

		// get image paths
		$this->load->helper('directory');

		$imageNames = directory_map('./'.$folderMini);

		$i=0;
		foreach($imageNames as $imageName) {
			$imagePaths[$i]['thumbnail'] = $folderMini.$imageName;
			$imagePaths[$i]['original'] = $folder.$imageName;
			$i++;
		}

		foreach($imagePaths as $imagePath) {
			$sql = "UPDATE sunglasses SET thumbnail_img_path = '".$imagePath['thumbnail']."' WHERE img_path='".$imagePath['original']."'";		
			echo $sql."<br />";
			$this->db->query($sql);
		}
	}

	/** getImagePaths method
	 *	Returns array of image paths of all images from folder $folder
	 *  @param $folder	folder with images
	 */
	private function getImagePaths($folder) {
		$this->load->helper('directory');

		$imageNames = directory_map('./'.$folder);
		foreach($imageNames as $imageName) {
			if(is_string($imageName)) {
				$path = base_url().$folder.$imageName;
				$imagePaths[] = $path;
			}
		}

		return $imagePaths;
	}

}
