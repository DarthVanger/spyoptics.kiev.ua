<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** MobileShop controller
 *
 *	Loads mobile shop view
 *
 */
class MobileShop extends CI_Controller {

	/** sunglasses
	 *	Loads sunglasses page
	 */
	public function sunglasses() {
		$this->load->model('SunglassesModel');
		$basket = $this->Basket->getInstance();
		
		$viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$viewData['cart']['items'] = $basket->getItems();
		$viewData['cart']['totalPrice'] = $basket->getTotalPrice();
		$viewData['pageName'] = "shop";

		$this->load->view('mobile/templates/main', $viewData);
	}

    /** order method
     *  Loads "order" page, showing order form and all the products.
     *
     *  @param $validationErrors array of strings - validation errors messages.
     *  All these messages will be displayed under the "submit" button.
     *  Default value: null.
     * 
     *  @return void
     */
    public function order($validationErrors = null)
    {
        $basket = $this->Basket->getInstance();
        $viewData['cart']['items'] = $basket->getItems();
        $viewData['cart']['totalPrice'] = $basket->getTotalPrice();
        $viewData['validationErrors'] = $validationErrors;

        // liqpay is under development
        $viewData['liqpay'] = $basket->prepareLiqpayFormData();

        $viewData['pageName'] = 'order';
		$this->load->view('mobile/templates/main', $viewData);
    }


    /** submitOrder
     *  Calls Basket model's submitOrder() method and loads success or fail view, depending on Basket model's response.
     *  Also performs form validation and loads "order" view again, if there are any.
     *
     *  @return void
     */
    public function submitOrder()
    {
        $basket = $this->Basket->getInstance();

        $submitResult = $basket->submitOrder($_POST);

        // form validation: phone must not be null!
        // (more advanced form validation is done in javascript, this is just a fallback)
        if(!$_POST['phone']) {
            $validationErrors = array();
            $validationErrors[] = 'Пожалуйста, укажите номер телефона!';
            $this->order($validationErrors);
        } else if(!$submitResult) { // if $basket->submitOrder() is ok 
            $viewData['pageName'] = 'submitOrderFail';
            $this->load->view('pageNoCart', $viewData);
        } else { // if $basket->submitOrder() went wrong
            $basket->removeAll();
            $viewData['pageName'] = 'submitOrderSuccess';
            $viewData['post'] = $_POST;
            $this->load->view('pageNoCart', $viewData);
        }
    }

}
