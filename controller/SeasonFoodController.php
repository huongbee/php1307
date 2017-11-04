<?php
include_once('Controller.php');


class SeasonFoodController extends Controller{

	public function getSeasonFood(){
		return $this->loadView('monan-theomua','','Season Food');
	}

}