<?php
include_once('Controller.php');
include_once('model/HomeModel.php');
include_once('model/pager.php');

class HomeController extends Controller{

	public function getIndex(){

		$model = new HomeModel();
		$today = $model->getFoodsToday();
		$foods = $model->getFoodsPagination();
		//print_r($today);
		$tongSP = count($foods);

		/*if(isset($_GET['page'])){
			$currentPage = abs($_GET['page']);
		}
		else{
			$currentPage = 1;
		}*/

		$trangHientai = 1;
		if(isset($_GET['page']) && $_GET['page']!=0 && is_numeric($_GET['page'])){
			$trangHientai = abs($_GET['page']);
		}
		//$trangHientai = (int)(isset($_GET['page']) && $_GET['page']!=0) ? abs($_GET['page']) : 1;

		$pager = new Pager($tongSP,$trangHientai,6,4);

		$soluong = $pager->get_nItemOnPage();
		$vitri = ($trangHientai-1)*$soluong;

		$foods = $model->getFoodsPagination($vitri,$soluong);

		$paginationHTML = $pager->showPagination();

		$arrData = [
			'today'			=>$today,
			'foods'			=>$foods,
			'paginationHTML'=>$paginationHTML
		];

		return $this->loadView('trangchu',$arrData);
	}


}




?>