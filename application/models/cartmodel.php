<?php

class CartModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function findById($id) {
		foreach($this->getContent() as $item) {
			if($item['id']==$id) return $item;
		}
		return false;
	}

	public function insert($product) {
		if(!is_int($product['id'])) {
			//throw new Exception('Cart::insert() - product ID is not set or is not a digit');
		}

		if(!isset($product['qty'])) $product['qty'] = 1;

		if($this->isInside($product['id'])) {
			$product = $this->findById($product['id']);
			$product['qty']++;
			$this->update($product);
		} else {
			$this->insertNew($product);
		}
	}

	public function update($newProduct) {
		$oldProduct = $this->findById($newProduct['id']);
		foreach($newProduct as $key=>$value) {
			$oldProduct[$key] = $value;
		}
		$this->remove($oldProduct['id']);
		$this->insertNew($oldProduct);
	}

	public function isInside($id) {
		if($this->isEmpty()) return false;
		foreach($this->getContent() as $item) {
			if($item['id']==$id) return true;
		}
		return false;
	}

	public function isEmpty() {
		if($this->getContent()===false) return true;
			else return false;
	}

	public function insertNew($product) {
		$cart = $this->session->userdata('cart');
		$cart[] = $product;
		$this->session->set_userdata('cart', $cart);	
	}

	public function remove($productId) {
		$cart = $this->getContent();
		$i = 0;
		foreach($cart as $item) {
			if($item['id']==$productId)
				unset($cart[$i]);
			$i++;
		}
		$this->session->set_userdata('cart', $cart);
	}
	
	public function removeOne($productId) {
		$cartContent = $this->getContent();
		$i = 0;
		foreach($cartContent as $product) {
			if($product['id'] == $productId) {
				$cartContent[$i]['qty']--;
				if($cartContent[$i]['qty']<1)
					unset($cartContent[$i]);
			}
			$i++;
		}
		$this->session->set_userdata('cart', $cartContent);
	}

	public function getContent() {
		return $this->session->userdata('cart');
	}
	
	public function getTotalPrice() {
		$this->load->model('Sunglasses');
	
		$productIds = $this->session->userdata('cartContent');
		
		if($productIds) {
			$sum = 0;
			foreach($productIds as $productId) {
				$product = $this->Sunglasses->selectById($productId);
				$sum += $product['price'];
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
