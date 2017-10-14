<?php

class Connect{

	public $_mysqli;
	public $_sql;

	public function __construct(){

		$this->_mysqli = new mysqli("localhost",'root','','php1307');
		$this->_mysqli->set_charset("utf8");

		if($this->_mysqli->connect_errno){
			echo "Lỗi kết nối: ".$this->_mysqli->connect_error;
			die;
		}
	}

	public function setQuery($sql){
		$this->_sql = $sql;
	}

	public function execute(){
		$result = $this->_mysqli->query($this->_sql);
		return $result;
	}

	public function loadAllRows(){
		$execute = $this->execute();
		$dataList = [];
		if($execute){
			while($row = $execute->fetch_object()){
				array_push($dataList, $row);
			}
		}
		return $dataList;
	}

	public function loadRow(){
		$execute = $this->execute();
		$row = false;
		if($execute){
			$row = $execute->fetch_object();
		}
		return $row;
	}

	public function getLastId(){
		return $this->_mysqli->insert_id;
	}

	public function disconnect(){
		$this->_mysqli = NULL;
	}
}

?>