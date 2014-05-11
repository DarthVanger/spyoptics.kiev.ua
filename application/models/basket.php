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
	 *	Property ['id'] is required!
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

}
