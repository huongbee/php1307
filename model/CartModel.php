<?php

include_once('connect.php');

class CartModel extends Connect{

	public function getDetail($id){
		$sql = "SELECT * FROM foods WHERE id= $id";
		$this->setQuery($sql);
		return $this->loadRow();
	}
}
