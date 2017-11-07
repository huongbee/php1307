<?php
session_start();
include_once('Controller.php');
require_once("Cart.php");
require_once('model/CheckoutModel.php');
require_once('inc/function.php');


class CheckoutController extends Controller{

	public function getCheckout(){

		$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($cart);
		// echo "<pre>";
		// print_r($cart);
		// echo "</pre>";
		return $this->loadView('dat-hang',$cart,'Checkout');
	}

	public function postCheckout(){
		$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		$cart = new Cart($cart);
		
		if($cart->items == null)  header("location:index.php");;
		//$cart->items == null ? header("location:index.php"):$cart;

		$fullname = $_POST['fullname'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		

		$model = new CheckoutModel();
		$idCustomer = $model->insertCustomer($fullname,$gender,$email,$address,$phone);

		if($idCustomer>0){
			//thành công
			$dateOrder= date('Y-m-d',time());
			$total = $cart->totalPrice;
			$note = isset($_POST['message']) ? $_POST['message'] : '';
			$token = createToken();
			$tokenDate= date('Y-m-d h:i:s',time());
			$idBill = $model->insertBill($idCustomer,$dateOrder,$total,$note,$token,$tokenDate);

			if($idBill){
				//lưu bill detail
				foreach($cart->items as $idFood => $food){
					$qty = (int)$food['qty'];
					$price = $food['price'];
					$result = $model->billDetail($idBill, $idFood, $qty, $price);
					if(!$result){
						echo "Lỗi"; //transaction
					}
				}	
				unset($_SESSION['cart']);
				unset($cart);
				//gửi mail

				setcookie('success',"Đặt hàng thành công, Vui lòng kiểm tra hộp thư để xác nhận đơn hàng.",time()+5);
			}
			else{
				//xóa customer đã tạo
				$model->deleteErrorCus($idCustomer);
			}

		}
		else{
			setcookie('error',"Có lỗi xảy ra, vui lòng kiểm tra lại",time()+5);
		}
		//echo "13323";
		//return $this->loadView('dat-hang',$cart,'Checkout');
		header("location:checkout.php");
	}
}

?>