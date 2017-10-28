<?php
//
require_once("Cart.php");
require_once("model/CartModel.php");
session_start();

class CartController {

	public function addToCart(){
		$id = $_POST['id'];
		$model = new CartModel();
		$item = $model->getDetail($id);

		$oldCart = null;
		if(isset($_SESSION['cart'])){
			$oldCart = $_SESSION['cart'];
		}

		$cart = new Cart($oldCart);
		$cart->add($item, $qty=1);
		$_SESSION['cart'] = $cart;

		echo $item->name;
	}
}