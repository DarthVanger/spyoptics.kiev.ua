<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** CartController controller
 *
 *	Provides interface to work with cart: add products, show products, make order.
 *
 */
class CartController extends CI_Controller {

	/** add
	 *	Adds sunglasses with id=$sunglassesId to the cart.	
	 *
	 *	@param $sunglassesId id of sunglasses to be added to cart
	 */
	public function add($sunglassesId) {
		$this->load->model('SunglassesModel');
		$this->SunglassesModel->addToCart($sunglassesId);
		echo "Adding product to cart";
	}

	/** remove
	 *	Removes sunglasses with id=$sunglassesId from the cart.
	 *	
	 *	$param sunglassesId id of sunglasses to be removed from the cart.
	 */
	public function remove($sunglassesId) { 
		$this->load->model('SunglassesModel');
		$this->SunglassesModel->removeFromCart($sunglassesId);

		echo "Removing prodcut from cart";
	}

	/** view method
	 *	Loads cart view, showing all the products.
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

	/** submitOrder
	 *	Calls Basket model's submitOrder() method and loads success or fail view, depending on Basket model's response.
	 */
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
	
	/** liqpayPaymentResponseHandler
	 *	Accepts POST message from Liqpay API with result of payment.
	 */
	public function liqpayPaymentResponseHandler() {
		$paymentStatus = ""; foreach($_POST as $key => $value) {
			$paymentStatus .= $key . ": " . $value . PHP_EOL;
		}

		$sql = "INSERT INTO payment (status) VALUES ('".$paymentStatus."')";
		$this->db->query($sql);
	}

	/** liqpayTest
	 *	Method for DEBUGGING.
	 *	Loads liqpayTest view, which has form to try liqpay.
	 */
	public function liqpayTest() {
		$this->load->view("header/minimal");
		$this->load->view("liqpayTest");
		$this->load->view("footer/minimal");
	}
}
