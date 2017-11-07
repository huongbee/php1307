<?php

include_once('controller/CheckoutController.php');
$c = new CheckoutController;

isset($_POST['btnCheckout']) ? $c->postCheckout() : $c->getCheckout();
//echo isset($_POST['btnCheckout']) ? "1234567":'';
?>