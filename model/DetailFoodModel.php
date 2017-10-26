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

	public function getFoodByType($id_food){
		$sql = "SELECT f.*, p.url FROM foods f
				INNER JOIN page_url p
					ON p.id = f.id_url
				WHERE f.id_type=(
					SELECT id_type FROM foods WHERE id=$id_food)
				ORDER BY f.update_at DESC
				LIMIT 0,20";

		$this->setQuery($sql);
		return $this->loadAllRows();
	}

}



?>