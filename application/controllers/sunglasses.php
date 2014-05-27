<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sunglasses extends CI_Controller {
	
		/** index method
		*	Loads main view, which displays sunglasses images. Gets image paths using Sunglasses model.
		*/
	public function show() {
		$this->load->model('SunglassesModel');
		
		// add miniatures to database
		//$this->load->model('SunglassesImageDbProcessor');
		//$this->SunglassesImageDbProcessor->addMiniatures();
		//$this->SunglassesImageDbProcessor->addToDbByImages();

		$sunglasses = $this->SunglassesModel->selectAll();	
		//$peoplePhotos = $this->

		$viewData['sunglasses'] = $sunglasses;
		//$viewData['peoplePhotos'] = $peoplePhotos;

		$this->load->model('Header');

		$this->load->view('header/forMainPage', $this->Header->getViewData());
		$this->load->view('sunglasses/flexSlider', $viewData);
		$this->load->view('footer');
	}
}
