<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** MobilePage controller
 *
 *	Provides methods to load pages for moblie version, via ajax.
 *
 */
class MobilePage extends CI_Controller {

	/** getPage
	 *	Is used via ajax to get a page named $pageName.
	 *	
	 *	@param $pageName name of the page to be loaded from "views/mobile/pages/".
	 */
	public function getPage($pageName) {
		$this->load->view("mobile/pages/" . $pageName);
	}

	/** order
	 *	Loads order page (page for making order).
	 */
	public function order() {
		$basket = $this->Basket->getInstance();

		$viewData["cart"] = $basket->getItems();

		$this->load->view("mobile/pages/order", $viewData);
	}
}
