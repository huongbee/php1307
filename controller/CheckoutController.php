<?php
session_start();
include_once('Controller.php');
require_once("Cart.php");
require_once('model/CheckoutModel.php');
require_once('inc/function.php');
require_once('inc/mailer.php');

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
		// echo $tokenDate= date('Y-m-d h:i:s',time());
		// echo "<br>";
		// echo $tokenTime = strtotime($tokenDate);
		// echo "<br>";
		// echo date('Y-m-d h:i:s',$tokenTime);
		// echo "<br>";
		// //echo time();
		// die;
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
			$tokenTime = strtotime($tokenDate);
			//die;
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
				//gửi mail

				$link = "http://localhost/php1307/xac-nhan-don-hang.php?token=$token&t=$tokenTime";
				$hinh = "http://localhost/php1307/public/restaurant-template-master/assets/images/hinh_mon_an/banh_chung.jpg";
				$noidungMail = "Chào bạn $fullname,
					Vui lòng chọn link bên dưới để xác nhận đơn hàng:
					$link

					<img src='$hinh'>
				";
				Mailer($fullname, $email,"Xác nhận đơn hàng",$noidungMail);
				

				unset($_SESSION['cart']);
				unset($cart);

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


	function acceptMail(){
		echo $token = $_GET['token'];
		echo "<br>";
		echo $tokenDate = $_GET['t'] + (24*60*60); //thời gian trong db so sánh với time hiện tại time()
		echo "<br>";
		$now = time();
		echo ($tokenDate-$now ) ;//> 0 còn hạn
		
	}
}

?>