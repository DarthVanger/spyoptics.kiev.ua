<?php

class CartModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function add($productId) {
		$cartContent = $this->session->userdata('cartContent');
		if(!$cartContent) $cartContent = array();
		$cartContent[] = $productId;
		$this->session->set_userdata('cartContent', $cartContent);

		$this->session->set_userdata('cartCount', count($cartContent));
	}
	
	public function remove($productId) {
		$cartContent = $this->session->userdata('cartContent');
		$i = 0;
		foreach($cartContent as $cartProductId) {
			if($cartProductId == $productId) 
				unset($cartContent[$i]);
			$i++;
		}
		$this->session->set_userdata('cartContent', $cartContent);
		
		$this->session->set_userdata('cartCount', count($cartContent));
	}
	
	public function getProducts() {
		$this->load->model('ProductDAO');
	
		$productIds = $this->session->userdata('cartContent');
		
		if($productIds) {
			$products = array();
			foreach($productIds as $productId) {
				$product = $this->ProductDAO->findById($productId);
				$products[] = $product;
			}
	
			return $products;
		} else {
			return null;
		}
	}
	
	public function getTotalPrice() {
		$this->load->model('ProductDAO');
	
		$productIds = $this->session->userdata('cartContent');
		
		if($productIds) {
			$sum = 0;
			foreach($productIds as $productId) {
				$product = $this->ProductDAO->findById($productId);
				$sum += $product->getPrice();
			}
	
			return $sum;
		} else {
			return null;
		}
	}

	public function clear() {
		$this->session->unset_userdata('cartContent');
		$this->session->unset_userdata('cartCount');
	}
}
