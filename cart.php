<?php
//session_start();
include_once('controller/CartController.php');
$c = new CartController;
$c->addToCart();


?>