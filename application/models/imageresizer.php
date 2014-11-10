<?php

class ImageResizer extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/** resize method
	 *
	 *	@param $height output height of resized images.
	 */
	public function resize($imagePath, $height) {
		$outputHeight = $height;

		// include resize_image function, which I copied from stackoverflow
		require_once('resources/resize_image.php');

		// resize and save image
        list($width, $height) = getimagesize($imagePath);
        $image = resize_image($imagePath, $width, $outputHeight); // old image width is passed to resize function, but it preserves ratio anyway
        // save image
        $newImagePath = './temp/'.end(explode('/', $imagePath));
        imagejpeg($image, $newImagePath);

        return $newImagePath;
	}
}
