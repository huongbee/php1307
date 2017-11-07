<?php

class Controller{


	public function __construct(){
		
		return date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	protected function loadView($view,$data = [],$title="Home"){
		include_once('view/layout.php');
	}
	
	protected function view($view,$data = ''){
		include_once("view/$view.php");
	}
}


?>