<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Sunglasses controller
 *
 *	Takes care of viewing sunglasses.
 *	
 */
class Sunglasses extends CI_Controller {
	
	/** show 
	 *	Shows all sunglasses using 'sunglasses' view.
	 */
	public function show() {
		$this->load->model('SunglassesModel');
		$basket = $this->Basket->getInstance();
		
		$viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$viewData['cartContent'] = $basket->getItems();

		$this->load->view('sunglasses', $viewData);
	}
}
