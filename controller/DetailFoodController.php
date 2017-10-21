<?php
include_once('Controller.php');


class DetailFoodController extends Controller{

	public function getDetailFood(){
		return $this->loadView('chitiet-monan');
	}

}