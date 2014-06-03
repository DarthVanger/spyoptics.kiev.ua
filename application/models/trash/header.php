<?php

/** Header model
 *
 *	Model of html page header. Provides methods to get data needed for header, e.g. cart content.
 *
 */
class Header extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/** getViewData
	 *	Returns array of variables needed by header view.
	 *
	 *	@return array of variables needed by header view.
	 */
	public function getViewData() {
		$viewData = array();		
		$basket = $this->Basket->getInstance();
		$viewData['cartContent'] = $basket->getItems();
		return $viewData;
	}
}
