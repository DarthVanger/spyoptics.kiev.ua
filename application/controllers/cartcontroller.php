<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CartController extends CI_Controller {
	public function add($productId) {
		$this->load->model('SunglassesModel');
		$this->SunglassesModel->addToCart($productId);
		echo "Adding product to cart";
	}
	public function remove($productId) { 
		$this->load->model('SunglassesModel');
		$this->SunglassesModel->removeFromCart($productId);

		echo "Removing prodcut from cart";
	}

	/** view method
	 * Loads cart view, showing all the products.
	 */
	public function view() {
		$basket = $this->Basket->getInstance();
		$viewData['cart']['items'] = $basket->getItems();
		$viewData['cart']['totalPrice'] = $basket->getTotalPrice();
		$viewData['liqpay'] = $basket->prepareLiqpayFormData();

		$this->load->view('header/forPageNoCart');	
		$this->load->view('cart/order', $viewData);	
		$this->load->view('footer/forPage');	
	}

	public function submitOrder() {
		$basket = $this->Basket->getInstance();
		
		$submitResult = $basket->submitOrder($_POST);

		$this->load->view("header/forPageNoCart");	
		if($submitResult == false) {
			$this->load->view("cart/submitOrderFail");
		} else {
			$basket->removeAll();
			$this->load->view("cart/submitOrderSuccess", $_POST);
		}
		$this->load->view("footer/forPage");	
	}
	
	/** liqpay
	 *	Loads page to pay via liqpay
	 */
	public function liqpay() {
		$basket = $this->Basket->getInstance();
		
		$viewData['liqpay'] = $this->Basket->prepareLiqpayFormData();
		
		$this->load->view("header/minimal");
		$this->load->view("cart/liqpay", $viewData);
		$this->load->view("footer/minimal");
	}

	public function liqpayPaymentResponseHandler() {
		$paymentStatus = "";
		foreach($_POST as $key => $value) {
			$paymentStatus .= $key . ": " . $value . PHP_EOL;
		}

		$sql = "INSERT INTO payment (status) VALUES ('".$paymentStatus."')";
		$this->db->query($sql);
	}

	public function liqpayTest() {
		$this->load->view("header/minimal");
		$this->load->view("liqpayTest");
		$this->load->view("footer/minimal");
	}
}
