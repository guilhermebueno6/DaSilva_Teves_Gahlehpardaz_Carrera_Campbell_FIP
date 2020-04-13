<?php

function login($username, $password, $ip){
    $pdo = Database::getInstance()->getConnection();

    $out = array('error' => false);
    
    //Check existence
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE username= :username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username' => $username,
        )
    );

    if($user_set->fetchColumn()>0){
        //Log user in
        $get_user_query = 'SELECT * FROM tbl_user WHERE username = :username';
        $get_user_query .= ' AND pass = :password';
        $user_check = $pdo->prepare($get_user_query);
        $user_check->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );

        while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
            $id = $found_user['ID'];
            $isChild = $found_user['isChild'];
            //Logged in!
            $_SESSION['user_id'] = $id;
            $_SESSION['user_restricted'] = $isChild;
            // $_SESSION['user_name'] = $found_user['fname'];

            //TODO: finish the following lines so that when user logged in
            // The user_ip column get updated by the $ip
            $update_query = 'UPDATE tbl_user SET ip = :ip WHERE ID = :id';
            $update_set = $pdo->prepare($update_query);
            $update_set->execute(
                array(
                    ':ip'=>$ip,
                    ':id'=>$id
                )
            );
        }

        if(isset($id)){
            if($isChild){
                $out['restricted'] = true;
            }
            $out['message'] = 'You just logged in!';
        }else{
            $out['message'] = 'Wrong password!';
            $out['error'] = true;
        }
    }else{
        //User does not exist
        $out['message'] = 'User does not exist';
        $out['error'] = true;
    }
    
    return $out;
}