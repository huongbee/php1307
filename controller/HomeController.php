<?php
include_once('Controller.php');
include_once('model/HomeModel.php');


class HomeController extends Controller{

	public function getIndex(){

		$model = new HomeModel();
		$today = $model->getFoodsToday();
		$foods = $model->getFoods();
		//print_r($today);

		$arrData = ['today'=>$today,'foods'=>$foods];

		return $this->loadView('trangchu',$arrData);
	}


}

?>