<?php
session_start();
include_once('Controller.php');
require_once("Cart.php");


class CheckoutController extends Controller{

	public function getCheckout(){

		$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($cart);
		// echo "<pre>";
		// print_r($cart);
		// echo "</pre>";
		//session_destroy();
		return $this->loadView('dat-hang',$cart,'Checkout');
	}
}

?>