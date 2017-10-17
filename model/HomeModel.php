<?php

include_once('connect.php');

class HomeModel extends Connect{

	public function getFoodsToday(){
		$sql = "SELECT * FROM foods WHERE today=1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function getFoods(){
		$sql = "SELECT * FROM foods";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


}



?>