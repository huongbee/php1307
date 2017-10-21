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
/*
function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Á|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach($unicode as $khongdau=>$codau){
        $arr = explode("|", $codau);
        $str = str_replace($arr,$khongdau,$str);
    }
    return $str;
}
function changeTitle($str){
	//"Chào bạn!"
	//Chào bạn
    $str = trim($str);
    if($str=="") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = str_replace(".", '', $str);
    $str = str_replace("!", '', $str);
    $str = str_replace("@", '', $str);
    $str = str_replace("&", '', $str);
    $str = stripUnicode($str); //Chao ban
    $str = mb_convert_case($str, MB_CASE_LOWER,'utf-8'); //chao ban
    $str = str_replace(' ', '-', $str);  //chao-ban
    return $str;
}


$s = "SELECT name FROM foods";

$m = new DBConnect;
$m->setQuery($s);
$result = $m->loadAllRows();

foreach ($result as $key=>$monan) {
	$alias = changeTitle($monan->name);
	$id = $key+1;
	$sql = "INSERT INTO page_url VALUES ($id,'$alias')";
	$n = new DBConnect;
	$n->setQuery($sql);
	$n->executeQuery();

	$update = "UPDATE foods SET id_url = $id WHERE name='$monan->name'";
	$a = new DBConnect ;
	$a->setQuery($update);
	$a->executeQuery();

}



*/

?>