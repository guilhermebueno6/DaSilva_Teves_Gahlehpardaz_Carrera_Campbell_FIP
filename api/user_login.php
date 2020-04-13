<?php 
    require_once 'load.php';

    $ip = $_SERVER['REMOTE_ADDR'];

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(!empty($username) && !empty($password)){
        //Log user in
        $out['message'] = login($username, $password, $ip);
    }else{
        $out['message'] = 'Please fill the required field';
        $out['error'] = true;
    }

    echo json_encode($out);