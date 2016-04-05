<?php

/** PeoplePhoto model
 *
 *	Model of mysql table "people_wearing_glasses".
 *	Provides methods to write/read from database.
 *
 ********************************
 *	Interface
 *******************************
 *	void addToDb($imgName, $sunglassesId);
 *	array selectAllWithSunglasses();
 ********************************
 *
 */
class PeoplePhoto extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/** addToDb
	 *	Adds new photo to database.
	 *
	 *	@param $imgName name of the image to be added. This image is supposed to be located in IMG . "peoplePhotos/".
	 *	@param $sunglassesId id of sunglasses that a person on the photo is wearing.
	 *
	 *	@return void
	 */
	function addToDb($imgName) {
		$img_path = "peoplePhotos/" . $imgName;

		$sql = "INSERT INTO people_wearing_glasses(img_path) VALUES('$img_path')";
		$this->db->query($sql);
		echo "<br /><p><strong>File <code>$imgName</code> was uploaded successfully!</strong></p>";
		//echo "<code>[ SQL query: ".$sql . " ]</code>";
	}

	/** getPhotos
	 *	Returns array of image pathes with info about sunglasses on this images.
	 *
	 *	@return array of image pathes with info about sunglasses on this images.
	 */
	function selectAllWithSunglasses() {
		$sql = "
			SELECT people_wearing_glasses.img_path, sunglasses_id, sort, sunglasses.model, sunglasses.color, sunglasses.price
			FROM people_wearing_glasses
			LEFT JOIN sunglasses
			ON people_wearing_glasses.sunglasses_id = sunglasses.id
      ORDER BY sort
		";
		$query = $this->db->query($sql);

		return $query->result_array();
	}
}
