<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CartController extends CI_Controller {
	public function add($productId) {
		$this->load->model('Sunglasses');
		$this->Sunglasses->addToCart($productId);
		echo "Adding product to cart";
	}
	public function remove($productId) { 
		$this->load->model('Sunglasses');
		$this->Sunglasses->removeFromCart($productId);

		echo "Removing prodcut from cart";
	}

	/** view method
	 * Loads cart view, showing all the products.
	 */
	public function view() {
		$this->load->view('cart.php');	
	}
}
