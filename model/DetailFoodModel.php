<?php

include_once('connect.php');

class DetailFoodModel extends Connect{

	public function getDetail($alias,$id){
		$sql = "SELECT f.*, p.url FROM foods f 
				INNER JOIN page_url p ON f.id_url = p.id
				WHERE p.url = '$alias'
				AND f.id= $id
				";
		$this->setQuery($sql);
		return $this->loadRow();
	}

}



?>