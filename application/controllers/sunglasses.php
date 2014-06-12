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
		$this->load->model('PeoplePhoto');
		$basket = $this->Basket->getInstance();
		
		$viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$viewData['peoplePhotos'] = $this->PeoplePhoto->selectAllWithSunglasses();	
		$viewData['cartContent'] = $basket->getItems();

		$this->load->view('sunglasses', $viewData);
	}
}
