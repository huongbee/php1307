<?php

function __autoload($className){
	require_once("controller/Cart.php");
}
// spl_autoload_register(function()  {
//    require_once('controller/Cart.php');
//    //$c = new Cart(null);
// });
?>