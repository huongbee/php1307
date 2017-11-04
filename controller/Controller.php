<?php

class Controller{

	protected function loadView($view,$data = [],$title="Home"){
		include_once('view/layout.php');
	}
	
	protected function view($view,$data = ''){
		include_once("view/$view.php");
	}
}


?>