<?php

//TODO: encrypt user input to match what we have on the database
require_once 'firstTime.php';
require_once 'timeOut.php';


function login($username, $password, $ip){
    
    $pdo = Database::getInstance()->getConnection();
    
   
    // return sprintf('You are trying usename=> %s, password=%s', $username, $password);
   

    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_user` WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
        );

        $user_tryCount = 'SELECT user_tryCount FROM `tbl_user` WHERE user_name =:username';
        $UTC_query = $pdo->prepare($user_tryCount);
        $UTC_query->execute(
            array(
                ':username'=>$username
            )
            );
        $foundTryCount = $UTC_query->fetch(PDO::FETCH_ASSOC);
        $tryCount = $foundTryCount['user_tryCount'];

//check if matches the user db

    if($user_set->fetchColumn()>0){
        if($tryCount>=3) {

           
            echo 'Your account has been suspended.';
            exit;
        }else{
           
                
            

        $check_match_query = 'SELECT * from `tbl_user` WHERE user_name =:username';
        $check_match_query .=' AND user_pass=:password';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
            );


        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $user_blockStmt = 'SELECT user_blocked FROM `tbl_user` WHERE username=:username AND user_pass=:password';
            $user_block_query = $pdo->prepare($user_blockStmt);
            $user_block_query->execute(
                array(
                    ':username'=>$username,
                    ':password'=>$password
                )
                );
                $isBlocked = $user_block_query->fetch(PDO::FETCH_ASSOC);

            if($isBlocked){
                echo 'Your account has been suspended';
                exit;
            }else{
            $id = $founduser['user_id'];

            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $founduser['user_fname'];

            //TODO: update the user table amd set the user_ip column to be $ip
            $update = 'UPDATE tbl_user SET user_ip =:ip WHERE user_id =:id';
            
            $user_update = $pdo->prepare($update);
            $user_update->execute(
                array(
                    ':ip'=>$ip,
                    ':id'=>$id
                )
                );
                // echo $update;
                // exit;
            //UPDATE tbl_user SET user_ip = '.$ip.' WHERE user_name = '.$username.'
            
        }}
           if(isset($id)){
           
            $user_tries = 'UPDATE tbl_user SET user_tryCount=0 where user_name=:username';
                    $user_count = $pdo->prepare($user_tries);
                    $user_count->execute(
                        array(
                            ':username'=>$username
                        )
                        );
            
           $bool = checkFirstTime($id);
               if($bool==1){
                $diff =timeOut($id);
                   if($diff>86400){
                    $blockStmt = 'UPDATE `tbl_user` SET user_blocked=1 WHERE user_id=:id';
                    $blockQuery = $pdo->prepare($blockStmt);
                    $blockQuery->execute(
                        array(
                            ':id'=>$id
                        )
                        );
                        session_destroy();
                        echo 'Your account has been suspended due to taking too long to log in.';
            }else{

                   
                redirect_to('./admin_edituser.php');
            }}else{
                redirect_to('./index.php');
            }
        }else{
            echo 'Something Went Wrong!';
            $user_tries = 'UPDATE tbl_user SET user_tryCount=user_tryCount+1 where user_name=:username';
                    $user_count = $pdo->prepare($user_tries);
                    $user_count->execute(
                        array(
                            ':username'=>$username
                        )
                        );
            
        }
    }}else{
        return 'User does not exist!';
    }

}

function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('admin_login.php');
    }
}

function logout($id){
    
    $pdo = Database::getInstance()->getConnection();
    
    // echo $id;
    // exit;
       $bool = checkFirstTime($id);
        // $bool = implode($bool);
        // var_dump($bool);
        // exit;
    if($bool==1){
        
        $update_firstTime = 'UPDATE `tbl_user` SET `first_time` = 0 WHERE `user_id`=:id';
        $query_update = $pdo->prepare($update_firstTime);
        $query_update->execute(
            array(
                ':id'=>$id
            )
            );
            session_destroy();
            redirect_to('admin_login.php');
            
    }else{
        session_destroy();
        redirect_to('admin_login.php');
        
    }
   
    
}