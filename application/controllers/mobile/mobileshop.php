<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** MobileShop controller
 *
 *	Loads mobile shop view
 *
 */
class MobileShop extends CI_Controller {

	/** index
	 *	Loads sunglasses page using main mobile template.
	 */
	public function index() {
		$this->load->model('SunglassesModel');
		$basket = $this->Basket->getInstance();
		
		$viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$viewData['cart']['items'] = $basket->getItems();
		$viewData['cart']['totalPrice'] = $basket->getTotalPrice();
		$viewData['pageName'] = "shop";

		$this->load->view('mobile/templates/main', $viewData);
	}
}
