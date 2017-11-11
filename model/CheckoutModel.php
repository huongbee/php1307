<?php

include_once('connect.php');

class CheckoutModel extends Connect{

	public function insertCustomer($name,$gender,$email,$address,$phone){
		$sql = "INSERT INTO customers(name,gender,email,address,phone) 
                VALUES('$name','$gender','$email','$address','$phone')";
		$this->setQuery($sql);
		//return $this->execute();
        $result = $this->execute();
        if($result){
            return $this->getLastId();
        }
        return false;
    }

    public function insertBill($idCus,$dateOrder,$total,$note,$token,$tokenDate){
        $sql = "INSERT INTO bills(id_customer,date_order,total,note,token,token_date)
                VALUES ($idCus,'$dateOrder',$total,'$note','$token','$tokenDate')";
        $this->setQuery($sql);
		$result = $this->execute();
        if($result){
            return $this->getLastId();
        }
        return false;
    }
    
    public function billDetail($id_bill, $id_food, $quantity, $price){
        $sql = "INSERT INTO bill_detail(id_bill,id_food,quantity,price)
                VALUES ($id_bill, $id_food, $quantity, $price)";
        $this->setQuery($sql);
        return $this->execute();
    }

    public function deleteErrorCus($idCustomer){
        $sql = "DELETE FROM customers WHERE id = $idCustomer";
        $this->setQuery($sql);
        return $this->execute();
    }


    public function updateBillAcceptMail($token){
       // echo $token; die;
        $sql = "UPDATE bills SET token=NULL, token_date=NULL, status=1 WHERE token='$token'";
        $this->setQuery($sql);
        $this->execute();
        return $this->rowCount();
    }
    
}
