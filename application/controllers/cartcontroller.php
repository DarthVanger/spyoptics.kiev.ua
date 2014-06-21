<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** CartController controller
 *
 *	Provides interface to work with cart: add product, remove product. 
 *
 */
class CartController extends CI_Controller
{

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
