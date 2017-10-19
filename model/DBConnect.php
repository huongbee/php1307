<?php

class DBConnect{

	protected $connect;
	protected $sql;
	protected $statement;

	public function __construct(){
		try{
			$this->connect = new PDO("mysql:host=localhost;dbname=php1307", "root", ""); 
			$this->connect->exec("set names utf8");
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function setQuery($query){
		$this->sql = $query;
	}

	public function setStatement($option = []){
		$this->statement = $this->connect->prepare($this->sql);
		$sl = count($option);
		if($sl>0){
			for($i=0;$i<$sl;$i++){
				$this->statement->bindParam($i+1,$option[$i]);
			}
		}

		//$this->statement->execute(); //true||false
		return $this->statement;
	}

	//sử dụng cho Insert/Update/Delete
	public function executeQuery($option = []){
		$stmt = $this->setStatement($option);
		return $stmt->execute();
	}

	//trả về nhiều dòng
	public function loadAllRows($option = []){

		$stmt = $this->setStatement($option);
		if($stmt->execute()){
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}
		return false;
	}

	//trả về 1 dòng
	public function loadRow($option = []){

		$stmt = $this->setStatement($option);
		if($stmt->execute()){
			return $this->statement->fetch(PDO::FETCH_OBJ);
		}
		return false;
	}

	public function getLastId(){
		return $this->connect->lastInsertId();
	}

	public function disconnect(){
		$this->connect = NULL;
	}
}
?>