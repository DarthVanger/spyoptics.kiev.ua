<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
		/** index method
		*	Loads main view, which displays sunglasses images. Gets image	paths using Sunglasses model.
		*/
	public function index() {
		$this->load->model('Sunglasses');
		
		// add miniatures to database
		//$this->load->model('SunglassesImageDbProcessor');
		//$this->SunglassesImageDbProcessor->addMiniatures();
		//$this->SunglassesImageDbProcessor->addToDbByImages();

		$sunglasses = $this->Sunglasses->selectAll();	

		$viewData['sunglasses'] = $sunglasses;

		$this->load->view('header');
		$this->load->view('main', $viewData);
		$this->load->view('footer');
	}
}
