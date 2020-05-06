<?php

class Product_model extends CI_Model{

	public function get_product(){

		// $product = array('name'=>'เสื้อยืด','price'=>50,'color'=>'แดง');
		// $product2 = array('name'=>'กางเกง','price'=>50,'color'=>'แดง');
		$all_product=$this->db->get_where('products')->result_array();
		return ($all_product);
	}

	public function add_product(){
		return 'add product';
	}
	public function delete_product(){
		// $a=2;
		// return	$this->get_product($a);
	}

	public function all_res(){
		$all_restaurant=$this->db->get('restaurants')->result_array();
		return ($all_restaurant);
	}
}
?>
