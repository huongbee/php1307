<?php

include_once('connect.php');

class HomeModel extends Connect{

	public function getFoodsToday(){
		$sql = "SELECT * FROM foods WHERE today=1";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	/*public function getFoods(){
		$sql = "SELECT * FROM foods";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}*/

	public function getFoodsPagination($vitri=-1,$soluong=0){

		$sql = "SELECT f.*,p.url 
				FROM foods f 
				INNER JOIN page_url p 
				ON p.id = f.id_url";
				
		if($vitri>=0 && $soluong>0){
			$sql .= " LIMIT $vitri,$soluong";
		}
		$this->setQuery($sql);
		return $this->loadAllRows();
	}


}



?>