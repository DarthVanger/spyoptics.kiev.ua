<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Admin controller
 *
 *	Is under development. Is intented to provide e-shop backend interface for managers.
 *
 */
class Admin extends CI_Controller {

	public function login() {

	}

	public function checkPass() {

	}

	/** uploadPeoplePhotos
	 *	Loads uploadPeoplePhotos view, which provides form for uploading photos of people wearing Spyoptic sunglasses.
	 */
	public function uploadPeoplePhotos() {
		$this->load->view("admin/header.php");
		$this->load->view("admin/uploadPeoplePhotos");
		$this->load->view("admin/footer.php");
	}
}
