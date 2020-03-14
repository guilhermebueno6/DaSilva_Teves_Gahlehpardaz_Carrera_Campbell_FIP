<?php


            

function encrypt($password){
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $encryption_iv = '1005199915091992'; 
    $encryption_key = "OurCMS"; 
    $encryption = openssl_encrypt($password, $ciphering, 
    $encryption_key, $options, $encryption_iv); 
    
    $password = $encryption;
    return $password;
}

function decrypt($password){
    $decryption_iv = '1005199915091992'; 
    $decryption_key = "OurCMS"; 
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $decryption=openssl_decrypt ($password, $ciphering,  
    $decryption_key, $options, $decryption_iv); 

    $password = $decryption;
    return $password;
}
