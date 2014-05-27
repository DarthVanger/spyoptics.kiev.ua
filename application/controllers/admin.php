<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function login() {

	}
	public function checkPass() {

	}
	public function uploadPeoplePhotos() {
		$this->load->view("admin/header.php");
		$this->load->view("admin/uploadPeoplePhotos");
		$this->load->view("admin/footer.php");
	}
}
