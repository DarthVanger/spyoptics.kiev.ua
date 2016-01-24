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

}
