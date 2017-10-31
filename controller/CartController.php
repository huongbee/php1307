<?php
//
require_once("Cart.php");
require_once("model/CartModel.php");
session_start();

class CartController {

	public function addToCart(){
		$id = $_POST['id'];
		if((int)$_POST['soluong'] <= 0 ){
			$qty = 1;
		}	
		else{
			$qty = (int)$_POST['soluong'];
		}
		$model = new CartModel();
		$item = $model->getDetail($id);

		$oldCart = null;
		if(isset($_SESSION['cart'])){
			$oldCart = $_SESSION['cart'];
		}

		$cart = new Cart($oldCart);
		$cart->add($item, $qty);
		$_SESSION['cart'] = $cart;

		//echo "<pre>";
		//print_r($_SESSION['cart']);
		//echo "</pre>";die;
		echo $item->name;
	}

	public function deleteCart(){
		$id = $_POST['id'];
		$model = new CartModel();

		$oldCart = null;
		if(isset($_SESSION['cart'])){
			$oldCart = $_SESSION['cart'];
		}

		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		$_SESSION['cart'] = $cart;
		if($cart->totalPrice == 0){
			unset($_SESSION['cart']);
			echo 0;
		}
		else
			echo number_format($cart->totalPrice);
	}
}