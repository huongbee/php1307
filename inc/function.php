<?php
function createToken(){
    $string = "0123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP";
    $stringLength = strlen($string);
    $token = '';
    for($i=1;$i<=32;$i++){
        $token .= substr($string,rand(0,$stringLength),1);
    }
    return $token;
}

?>