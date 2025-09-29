<?php

function cripto($senha){
    $c = '';
    for($i=0; $i<strlen($senha); $i++){
        $letra = ord($senha[$i]) + 1;
        $c .= chr($letra);
    }
    return $c;
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash){
    return password_verify($senha, $hash);
}
//echo gerarHash("abc");
//echo testarHash("bcd", "$2y$10$5BDJ6.K2jWPIR13N77wSK.wi2rTu7jvkXjz/9ZxIfB.JXFDsbhnGa")? "SIM":"NÃO ";
?>