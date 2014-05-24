<?php
class SunglassesModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	public function selectAll() {
		$sql = "SELECT * FROM sunglasses";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function selectById($id) {
		$sql = "SELECT * FROM sunglasses WHERE id=".$id;
		$query = $this->db->query($sql);

		return $query->row_array();
	}

	public function addToCart($id) {
		$sunglasses = $this->selectById($id);		

		$basket = $this->Basket->getInstance();
		$basket->insert($sunglasses);
	}

	public function removeFromCart($id) {
		$sunglasses = $this->selectById($id);		
		
		$basket = $this->Basket->getInstance();
		$this->Basket->remove($sunglasses);
	}
}
