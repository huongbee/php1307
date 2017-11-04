<?php
include_once('Controller.php');


class SearchController extends Controller{

	public function getSearchFood(){
		return $this->loadView('timkiem','','Search');
	}
}

?>