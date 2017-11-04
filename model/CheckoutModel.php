<?php

include_once('connect.php');

class CheckoutModel extends Connect{

	public function insertCustomer($name,$gender,$email,$address,$phone,$message){
		$sql = "INSERT INTO customers(name,gender,email,address,phone,note) 
                VALUES('$name','$gender','$email','$address','$phone','$message')";
		$this->setQuery($sql);
		return $this->execute();
    }

    public function insertBill($idCus,$dateOrder,$total,$token,$tokenDate){
        $sql = "INSERT INTO bills(id_customer,date_order,total,token,token_date)
                VALUES ($idCus,'$dateOrder',$total,'$token','$tokenDate')";
        $this->setQuery($sql);
		return $this->execute();
    }
    
    public function billDetail($id_bill, $id_food, $quantity, $price){
        $sql = "INSERT INTO bill_detail(id_bill,id_food,quantity,price)
                VALUES ($id_bill, $id_food, $quantity, $price)";
        $this->setQuery($sql);
        return $this->execute();
    }
}
