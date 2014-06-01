<?php

/** Basket class (singleton)
 *
 *	Basket (cart) for e-shop.
 *	
 *	Uses PHP Session to store items.
 *	Also provides methods to submit orders.
 *
 ********************************
 *	Interface
 *******************************
 *	Basket getInstance();
 *	Array getItems();
 *	void insert($item);
 *	bool remove($item);
 *	void removeAll();
 *	bool isInside($item);
 *	bool submitOrder($userInfo);
 ********************************
 *
 *	@author DarthVanger
 */

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
	 *
	 *	@return Basket instance
	 */
	public static function getInstance() {
		if(self::$instance === null) {
			self::$instance = new Basket();
		}
		return self::$instance;
	}

	/** saveBasketToSession
	 *	Saves $this->items to session
	 */
	public function saveBasketToSession() {
		$this->session->set_userdata('cartItems', $this->items);
	}

	/** getItems
	*	Returns all items from the basket.
	*	 
	*	@return $this->items - all items from the basket.
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

	/** removeAll
	 *	Removes all items from the basket.
	 *
	 */
	 public function removeAll() {
		$this->items = null;
		$this->saveBasketToSession();
	 }

	/** isInside
	 *	Checks if $item is inside the basket.
	 *
	 *	@param $item item to be checked.
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

	/** getItemsCount
	 *	Returns count of all items in the basket.
	 */
	 public function getItemsCount() {
		return count($this->items);
	 }

	/***********************************************************/

	/*************** Methods for making orders ****************/


	/** submitOrder
	 *	Saves order to database and sends email notification to shop managers.
	 *
	 *	@return true on success, false on fail.
	 */
	 public function submitOrder($userInfo) {
	 	//$this->saveOrderToDb($userInfo); // Not implemented yet!
	 	return $this->sendNewOrderNotification($userInfo);
	 }

	 /** sendNewOrderNotification
	  *	 Sends email with all info to $shopManagerEmail (specified inside this method).
	  *
	  *	 @return true on success, false on fail.
	  */
	 private function sendNewOrderNotification($userInfo) {
	 	$shopManagerEmails = "Acdc2007@ukr.net, DarthVanger@gmail.com";
		$subject = "spyoptics.kiev.ua";
		$from = "Силы Тьмы <DarkSide@nowhere>";
		$message = "Новый заказ!<br />";
		$message .= "Инфо о клиенте:<br />";
		foreach($userInfo as $key => $value) {
			$message .= $key.": ".$value."<br />";
		}
		$message .= "Заказ:"."<br />";
		if(is_array($this->items)) {
			foreach($this->items as $item) {
				$message .= $item['model']." ".$item['color']."<br />";
			}
		} else {
			$message .= "Корзина пуста<br />";
		}

		// prepare headers for using mail() function
		$headers = "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;
		$headers .= 'From: ' . $from . PHP_EOL;

		return mail($shopManagerEmails, $subject, $message, $headers);
	 }

	/** prepareLiqpayFormData
	 *	Prepares data for liqpay payment.
	 *
	 *	@return array with variables, needed for liqpay form.
	 */
	public function prepareLiqpayFormData() {
		$formData = array();

		$formData['sandbox'] = 1;
		// url where user will be redirected after payment
		$formData['result_url'] = site_url("cartcontroller/liqpayPaymentResult");
		// url where server answer about operation result will be sent
		// spyoptics.kiev.ua is for testing. Real url is here: $formData['server_url'] = site_url("cartcontroller/liqpayPaymentResponseHandler");
		$formData['server_url'] = ("http://spyoptics.kiev.ua/index.php/cartcontroller/liqpayPaymentResponseHandler");
		$formData['amount'] = $this->getTotalPrice();
		$formData['description'] = "Оплата покупки очков Spyoptic (".$this->getItemsCount()." шт)";

		return $formData;
	}
}
