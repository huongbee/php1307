<?php
//
session_start();
//require_once("Cart.php");
require_once('Controller.php');
require_once("model/CartModel.php");
//

// function __autoload($className){
// 	require_once("controller/Cart.php");
// }
// spl_autoload_register(function(){
// 	require_once("controller/Cart.php");
// });
class CartController extends Controller{

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
		//unset($_SESSION['cart']->items[$id]);
		$oldCart = null;
		if(isset($_SESSION['cart'])){
			$oldCart = $_SESSION['cart'];
		}

		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		$_SESSION['cart'] = $cart; //update lại session

		if($cart->totalPrice == 0){
			unset($_SESSION['cart']);
			echo 0;
		}
		else
			echo number_format($cart->totalPrice)." vnđ";
	}

	public function updateCart(){
		$id = (int)$_POST['id'];
		$qty = (int)$_POST['qty'];

		$model = new CartModel();
		$product = $model->getDetail($id);

		$oldCart = null;
		if(isset($_SESSION['cart'])){
			$oldCart = $_SESSION['cart'];
		}

		$cart = new Cart($oldCart);
		$cart->update($product, $id, $qty);
		$_SESSION['cart'] = $cart; //update lại session

		$data = json_encode([
			'dongiaSanpham'	=>number_format($cart->items[$id]['price'])." vnđ",
			'tongtien' 		=> number_format($cart->totalPrice)." vnđ"
		]);
		return $this->view('result_ajax',$data);
		//print_r($_SESSION['cart'] );
	}
}