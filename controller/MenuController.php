<?php
include_once('Controller.php');


class MenuController extends Controller{

	public function getMenu(){
		return $this->loadView('ds-thuc-don');
	}
}

?>