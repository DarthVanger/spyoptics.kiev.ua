<?php

class Basket extends CI_Model {

	/* singleton instance */
	private static $instance = null;
	/* $items is an array of containing items */
	private $items = null;

	function __construct() {
		parent::__construct();
		
		if($this->session->userdata('cartItems') === false) { // if cartItems session variable is not set
			$this->items = null;
		} else {
			$this->items = $this->session->userdata('cartItems');
		}
	}

	/** getInstance
	 *	Singleton getInstance method - returns existing $this->instance or creates a new one if none is existing.
	 */
	public static function getInstance() {
		if(self::$instance === null) {
			self::$instance = new Basket();
		}
		return self::$instance;
	}

	/** getItems
	*	 Returns all items from the basket.
	*	 
	*	 @return $this->items - all items from the basket.
	*/
	public function getItems() {
		return $this->items;
	}

	/** setItems
	*	Sets $this->items and stores $items 
	*  @param $items - array of items.
	*/
	public function setItems($items) {
		$this->items = $items;
		$this->saveBasketToSession();
	}

	public function saveBasketToSession() {
		$this->session->set_userdata('cartItems', $this->items);
	}

	/** insert
	 *	Inserts an item to the basket.
	 *	
	 *	@param $item array of item's properties in format [nameOfProperty] => [value]. Examples of properties: id, name, price.
	 *	
	 */
	public function insert($item) {
		if(!is_array($item)) throw new Exception("basket::insert() - item is not array!");
		$this->items[] = $item;
		$this->saveBasketToSession();
	}

	/** remove
	 *	Removes $item from the basket.
	 *
	 *	@return true on success, false if there now such item in the basket.
	 */
	 public function remove($item) {
		foreach($this->items as $key => $itemInBasket) {
			if($itemInBasket == $item) {
				unset($this->items[$key]);
				$this->saveBasketToSession();
				return true;
			}
		}
		$this->Log->message("debug", "Basket::remove() - no such item in the basket, nothing to remove");
		return false;
	 }

	/** isInside
	 *	Checks if $item is inside the basket.
	 *
	 * 	@return bool
	 */
	 public function isInside($item) {
		foreach($this->$items as $itemInsideTheBasket) {
			if($item == $itemInsideTheBasket) {
				return true;
			}
		}
		return false;
	 }

	 /** getTotalPrice
	  *	 Returns total price of all items in the basket.
	  */
	  public function getTotalPrice() {
		$items = $this->getItems();

		if(!is_array($items)) return 0; // if cart is empty

		$totalPrice = 0;
		foreach($items as $item) {
			$totalPrice += $item['price'];
		}

		return $totalPrice;
	  }

	/** submitOrder
	 *	Submits order by sending email with all info to $this->shopManagerEmail
	 */
	 public function submitOrder($userInfo) {
	 	$shopManagerEmail = "darthvanger@gmail.com";
		$subject = "spyoptics.kiev.ua";
		$from= "Силы Тьмы";
		$message = "Инфо о клиенте:\n";
		foreach($userInfo as $key => $value) {
			$message .= $key.": ".$value."\n";
		}
		$message .= "Заказ:\n";
		if(is_array($this->items)) {
			foreach($this->items as $item) {
				$message .= $item['model']." ".$item['color']."\n";
			}
		} else {
			$message .= "Корзина пуста\n";
		}

		return $this->sendEmail($shopManagerEmail, $subject, $message, $from);
	 }

	 private function sendEmail($to, $subject, $message, $from) {
	 	/*
		$this->load->library('email');

		$this->email->from($from, 'Силы Тьмы');
		$this->email->to($to); 

		$this->email->subject($subject);
		$this->email->message($message);	

		$this->email->send();

		return $this->email->print_debugger();
		*/
		return mail($to, $subject, $message, "From: $from");
	 }



}
