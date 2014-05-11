<?php

class Header extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getViewData() {
		$viewData = array();		
		$basket = $this->Basket->getInstance();
		$viewData['cartContent'] = $basket->getItems();
		return $viewData;
	}
}
