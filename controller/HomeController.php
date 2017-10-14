<?php
include_once('Controller.php');


class HomeController extends Controller{

	public function getIndex(){
		return $this->loadView('trangchu');
	}


}

?>