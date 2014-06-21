<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Page controller
 *
 *	Takes care of loading pages with simple html content (like contacts, about, etc).
 *
 */
class Page extends CI_Controller {
	/** load
	 *	Loads page named $pageName.
	 *
	 *	@param $pageName name of page to be loaded.
	 */
	public function load($pageName) {
		$basket = $this->Basket->getInstance();

		$viewData['pageName'] = $pageName;
		$viewData['cartContent'] = $basket->getItems(); // cartContent is needed by cart in page header.

		$this->load->view('page', $viewData);
	}
}
