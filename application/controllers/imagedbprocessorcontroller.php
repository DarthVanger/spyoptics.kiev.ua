<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImageDbProcessorController extends CI_Controller {
	public function index() {
		$this->load->model("ImageDbProcessor");

		//$this->ImageDbProcessor->resize('kenBlockHelm', '30');
		//$this->ImageDbProcessor->cropAndResize('flynn', '30');
		//$this->ImageDbProcessor->addThumbnails('kenBlockHelm', 'h30');
		//$this->ImageDbProcessor->addMiniatures('flynn', 'h200');
		$this->ImageDbProcessor->addMiniatures('kenBlockHelm', 'h200');
	}
}
