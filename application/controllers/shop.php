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
		$this->load->model('DiscountCalculator');

		$this->viewData['sunglasses'] = $this->SunglassesModel->selectAll();	
		$this->viewData['peoplePhotos'] = $this->PeoplePhoto->selectAllWithSunglasses();	

		$basket = $this->Basket->getInstance();
        $this->viewData['cart'] = array();
		$this->viewData['cart']['content'] = $basket->getItems();
		$this->viewData['cart']['totalPrice'] = $basket->getTotalPrice();
		$this->viewData['cart']['itemCount'] = $basket->getItemsCount();

        if ($this->userDevice == 'pc') {
            $this->load->view($this->userDevice . '/sunglasses', $this->viewData);
        } else if($this->userDevice == 'mobile') {
            $this->viewData['pageName'] = 'sunglasses';
            $this->load->view($this->userDevice . '/templates/main', $this->viewData);
        }

        if (isset($_COOKIE['admin'])) {
            // enable JS editing
            $this->load->view('admin/product/edit-script.php');
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
     *  Validates "order" form $_POST data, and calls $this->submitValidatedOrder()
     *  when validaation is passed.
     *
     *  @return void
	 */
	public function submitOrder()
    {
        // validation
        $this->load->library('form_validation');

        // syntax: set_rules(field, label, rules)
        $this->form_validation->set_rules('name', 'Имя', 'required');
        $this->form_validation->set_rules('phone', 'Телефон', 'required');
        $this->form_validation->set_rules('address', 'Адрес', 'required');

        // syntax: set_message('rule', 'Error Message');
        $this->form_validation->set_message('required', 'Поле <b>%s</b> не должно быть пустым');

        if ($this->form_validation->run() == FALSE) {
            $this->order();
        } else {
            $this->submitValidatedOrder($_POST);
        }
	}

    /** submitValidatedOrder
     *  Must be called only after order info is validated.
	 *	Calls Basket model's submitOrder() method and loads success or fail view, depending on Basket model's response.
     *
     *  @param $userInputData associative array of data that user entered into input fields (e.g. $_POST)
     *
     *  @return void
     */
    private function submitValidatedOrder($userInputData) {
        $basket = $this->Basket->getInstance();

        $submitData['userInputData'] = $userInputData;
        $submitData['userDevice'] = $this->userDevice;
        $submitData['userAgent'] = $this->agent->agent_string();
        
        $submitResult = $basket->submitOrder($submitData);
        
        if (!$submitResult) { // if $basket->submitOrder() went wrong
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
