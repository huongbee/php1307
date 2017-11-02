<?php

$action = isset($_POST['action']) ? $_POST['action'] : "add";
include_once('controller/CartController.php');
$c = new CartController;

if($action=='add')
	$c->addToCart();

elseif($action=="delete")
	$c->deleteCart();
else
	//$action == 'update'
	$c->updateCart();

?>