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
	public function resize($folder, $height) {
		// config
		$folder = 'assets/img/'.$folder.'/'; // folder path WITH trailing slash!
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

		$folder = 'assets/img/'.$model.'/';

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
	 *	
	 *	$model, $css_class, $pice, $batch from config section of method are field values that will newly added sunglasses have.
	 *
	 */
	public function addToDbByImages() {
		// config
		$folder = 'kenBlockHelm2/';
		$model = 'Ken Block Helm';
		$css_class = 'kenBlockHelm2';
		$price = 150;
		$batch = 2;

		// get image pathes
		$this->load->helper('directory');

		$imageNames = directory_map('./assets/img/'.$folder);

		$i = 0;
		foreach($imageNames as $imageName) {
			if(is_string($imageName)) {
				$images[$i]['path'] = $folder.$imageName;
				$images[$i]['mini_path'] = $folder."h200/".$imageName;
				$images[$i]['thumbnail_path'] = $folder."h30/".$imageName;
				$images[$i]['color'] = substr($imageName, 0, -4);
				$i++;
			}
		}

		foreach($images as $image) {
			$sql = "INSERT INTO sunglasses (
				model, img_path, mini_img_path, thumbnail_img_path, color, css_class, price, batch
			) 
			VALUES (
				'".$model."', '".$image['path']."', '".$image['mini_path']."', '".$image['thumbnail_path']."', '".$image['color']."', '".$css_class."', ".$price.", ".$batch."
			)";
			echo $sql."<br />";
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

	/** relocateImages
	 *	DEPRECATED. Was used only once to remove "images/" prefix in image pathes from database.
	 *
	 */
	public function relocateImages($oldFolder="images", $newFolder="") {
		$query = $this->db->query("SELECT id, img_path, mini_img_path, thumbnail_img_path FROM sunglasses");
		foreach($query->result_array() as $row) {
			$pattern = "/".$oldFolder."\//";
			$newImagePath = preg_replace($pattern, $newFolder, $row['img_path']);
			$newImagePathMini = preg_replace($pattern, $newFolder, $row['mini_img_path']);
			$newImagePathThumbnail = preg_replace($pattern, $newFolder, $row['thumbnail_img_path']);
			echo $newImagePath."<br />";
			echo $newImagePathMini."<br />";
			echo $newImagePathThumbnail."<br />";
			$id = $row['id'];
			$this->db->query("UPDATE sunglasses SET img_path = '".$newImagePath."' WHERE id=".$id);
			$this->db->query("UPDATE sunglasses SET mini_img_path = '".$newImagePathMini."' WHERE id=".$id);
			$this->db->query("UPDATE sunglasses SET thumbnail_img_path = '".$newImagePathThumbnail."' WHERE id=".$id);
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
