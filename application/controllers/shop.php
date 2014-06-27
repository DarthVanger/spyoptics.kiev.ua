<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** Shop controller
 *
 *  Main controller for shop pages: show products, make order, submit order, etc.
 *
 */
class Shop extends CI_Controller
{
    private $userDevice;
    private $viewData;

    public function __construct()
    {
        parent::__construct();
        if($this->agent->is_mobile()) {
            $this->userDevice = 'mobile';
        } else {
            $this->userDevice = 'pc'; 
        }

        // testing mobile version
        //$this->userDevice = 'mobile';

        $this->viewData['userDevice'] = $this->userDevice;

    }

	/** loadSimplePage
	 *	Loads simple page named $pageName.
	 *
	 *	@param $pageName name of page to be loaded.
	 */
	public function loadSimplePage($pageName) {
		$basket = $this->Basket->getInstance();

		$this->viewData['pageName'] = $pageName;
		$this->viewData['cartContent'] = $basket->getItems(); // cartContent is needed by cart in page header.

		$this->load->view($this->userDevice . '/templates/main', $this->viewData);
	}

	/** showSunglasses 
	 *	Shows all sunglasses using 'sunglasses' view.
	 */
	public function showSunglasses()
    {
		$this->load->model('SunglassesModel');
		$this->load->model('PeoplePhoto');
		$basket = $this->Basket->getInstance();
		
		$this->viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$this->viewData['peoplePhotos'] = $this->PeoplePhoto->selectAllWithSunglasses();	
		$this->viewData['cartContent'] = $basket->getItems();

        if($this->userDevice == 'pc') {
            $this->load->view($this->userDevice . '/sunglasses', $this->viewData);
        } else if($this->userDevice == 'mobile') {
            $this->viewData['pageName'] = 'sunglasses';
            $this->load->view($this->userDevice . '/templates/main', $this->viewData);
        }
	}

	/** showPeoplePhotos
	 *	Shows people photos.
	 */
	public function showPeoplePhotos()
    {
		$this->load->model('PeoplePhoto');
		
		$this->viewData['peoplePhotos'] = $this->PeoplePhoto->selectAllWithSunglasses();	

        $this->viewData['pageName'] = 'peoplePhotos';
        $this->load->view($this->userDevice . '/templates/main', $this->viewData);
	}

	/** order method
	 *	Loads "order" page, showing order form and all the products.
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
		$this->viewData['cart']['items'] = $basket->getItems();
		$this->viewData['cart']['totalPrice'] = $basket->getTotalPrice();
		$this->viewData['validationErrors'] = $validationErrors;

        // liqpay is under development
		$this->viewData['liqpay'] = $basket->prepareLiqpayFormData();

		$this->viewData['pageName'] = 'order';
		$this->viewData['hideHeaderCart'] = true;

		$this->load->view($this->userDevice . '/templates/main', $this->viewData);	
	}

	/** submitOrder
	 *	Calls Basket model's submitOrder() method and loads success or fail view, depending on Basket model's response.
     *  Also performs form validation and loads "order" view again, if there are any.
     *
     *  @return void
	 */

	public function submitOrder()
    {
		$basket = $this->Basket->getInstance();

        $submitData['post'] = $_POST;
        $submitData['userDevice'] = $this->userDevice;
        $submitData['userAgent'] = $this->agent->agent_string();
		
		$submitResult = $basket->submitOrder($submitData);
        
        if(!$submitResult) { // if $basket->submitOrder() went wrong
            $this->viewData['pageName'] = 'submitOrderFail';
            $this->viewData['hideHeaderCart'] = true;
            $this->load->view($this->userDevice . '/templates/main', $this->viewData);
        } else { // if $basket->submitOrder() is ok
            $this->viewData['pageName'] = 'submitOrderSuccess';
            $this->viewData['hideHeaderCart'] = true;
            $this->viewData['post'] = $_POST;
            // cartItems are needed by JS for google analytics ecommerce 
            $this->viewData['cartItemsJSON'] = json_encode($basket->getItems());
            $this->viewData['totalPrice'] = $basket->getTotalPrice();

            $basket->removeAll();

            $this->load->view($this->userDevice . '/templates/main', $this->viewData);
        }
	}

}
