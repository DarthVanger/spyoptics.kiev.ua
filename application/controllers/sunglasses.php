<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sunglasses extends CI_Controller {
	
		/** index method
		*	Loads main view, which displays sunglasses images. Gets image paths using Sunglasses model.
		*/
	public function show() {
		$this->load->model('SunglassesModel');
		
		$sunglasses = $this->SunglassesModel->selectAll();	
		//$peoplePhotos = $this->

		$viewData['sunglasses'] = $sunglasses;
		//$viewData['peoplePhotos'] = $peoplePhotos;

		$this->load->model('Header');

		$this->load->view('header/forMainPage', $this->Header->getViewData());
		$this->load->view('sunglasses/flexSlider', $viewData);
		$this->load->view('footer/forMainPage');
	}
}
