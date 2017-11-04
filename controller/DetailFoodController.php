<?php
include_once('Controller.php');
include_once('model/DetailFoodModel.php');

class DetailFoodController extends Controller{

	public function getDetailFood(){

		$alias = $_GET['alias'];
		$id = (int)$_GET['id'];

		$model = new DetailFoodModel;
		$food = $model->getDetail($alias,$id);
		$relatedFood = $model->getFoodByType($id);
		
		if($food==NULL){
			header("Location:404.php");
		}
		else{
			$arrData = [
				'food'=>$food,
				'relatedFood'=>$relatedFood
			];
			return $this->loadView('chitiet-monan',$arrData,'Detail Food');
		}
		
	}

}