<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Sunglasses controller
 *
 *	Takes care of viewing sunglasses.
 *	
 */
class Sunglasses extends CI_Controller {
	
		/** show 
		 *	Shows all sunglasses using 'sunglasses/flexSlider' view.
		 */
	public function show() {
		$this->load->model('SunglassesModel');
		
		$sunglasses = $this->SunglassesModel->selectAll();	

		$viewData['sunglasses'] = $sunglasses;

		$this->load->model('Header');

		$this->load->view('header/forMainPage', $this->Header->getViewData());
		$this->load->view('sunglasses/flexSlider', $viewData);
		$this->load->view('footer/forMainPage');
	}
}
