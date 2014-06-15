<?php
/** SunglassesModel class
 *
 *	Provides methods to get sunglasses from database and cart, add sunglasses to cart.	
 *
 ********************************
 *	Interface
 ********************************
 *	array selectAll();
 *	array selectById();	
 *	void addToCart($id);
 *	void removeFromCart($id);
 ********************************
 *
 */
class SunglassesModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	/** selectAll
	 *	Returns array of all sunglasses from database.
	 *
	 *	@return array of all sunglasses from database.
	 */
	public function selectAll() {
		$sql = "SELECT * FROM sunglasses";
		$query = $this->db->query($sql);

		$sunglassesArray = $query->result_array();

		$sunglassesArray = $this->addInCartKeys($sunglassesArray);

		return $sunglassesArray;
	}


	/** selectById
	 *	Gets sunglasses with id=$id from database.
	 *
	 *  @param $id id of sunglasses to be selected from database.
	 *	@return array of properties representing the sunglasses with id=$id.	
	 */
	public function selectById($id) {
		$sql = "SELECT * FROM sunglasses WHERE id=".$id;
		$query = $this->db->query($sql);

		return $query->row_array();
	}

	/** addToCart
	 *	Finds sunglasses with id=$id in database and adds it to cart.
	 *
	 *	@param $id id of sunglasses to be inserted in the cart.
	 *	@return void
	 */
	public function addToCart($id) {
		$sunglasses = $this->selectById($id);		

		$basket = $this->Basket->getInstance();
		$basket->insert($sunglasses);
	}

	/** removeFromCart
	 *	Removes sunglasses with id=$id from the cart.
	 *
	 *	@param $id id of sunglasses to be removed from the cart.
	 *	@return void
	 */
	public function removeFromCart($id) {
		$sunglasses = $this->selectById($id);		
		
		$basket = $this->Basket->getInstance();
		$this->Basket->remove($sunglasses);
	}

	/** addInCartKeys
	 *	Adds 'inCart'=true/false key to all sunglasses in $sunglassesArray, depending on their presense in the cart.
	 *
	 *	@param $sunglassesArray array of sunglasses to be marked
	 *
	 *	@return updated array of sunglasses
	 */
	private function addInCartKeys($sunglassesArray) {
		$basket = $this->Basket->getInstance();
		$sunglassesInCart = $basket->getItems();

		$i = 0;
		foreach($sunglassesArray as $sunglass) {
			$sunglassesArray[$i]['inCart'] = false;
			foreach($sunglassesInCart as $sunglassInCart) {
				if($sunglass['id'] == $sunglassInCart['id']) {
					$sunglassesArray[$i]['inCart'] = true;
				}
			}
			$i++;
		}

		return $sunglassesArray;
	}
}
