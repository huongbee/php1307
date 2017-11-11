<?php
function createToken(){
    $string = "0123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP";
    $stringLength = strlen($string)-1;
    $token = '';
    for($i=1;$i<=32;$i++){
        $token .= substr($string,rand(0,$stringLength),1);
    }
    return $token;
}
//40Tp2D5mEugt6NoGnRtUFrSYxFvjjLG
//oJOuTBXLciXnMJsHFVVyw6nfHxoMo7S
//jlk0v2jhF2z2lkZzueonqWPOti9q08gd
?>