<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'randompass.php';
require_once 'encryption.php';
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);


function createUser($fname, $username, $email){
    $pdo = Database::getInstance()->getConnection();
    //TODO:Create a random password
    $password = randomPassword();
  
        
    $password = encrypt($password);
   
    


    //TODO: build the proper SQL query with the information above 
    //execute it to create a user in tbl_user
    $createquery = 'INSERT INTO `tbl_user` (user_fname, user_name, user_pass, user_email) VALUES (:fname, :username, :password, :email)';
    $executeCreate = $pdo->prepare($createquery);
    $create_user_result = $executeCreate->execute(
        array(
            ':fname'=>$fname,
            ':username'=> $username,
            ':password'=> $password,
            ':email'=> $email
        )

        );
        
    //TODO based on execution result, if everything goes through redirect to the index.php
    //otherwise return an error message
       if($create_user_result){
       

        $password = decrypt($password);
           //Using PHP mailer to send User info
           echo $email;
           $mail = new PHPMailer(true);

            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'panCMS8@gmail.com';          // SMTP username
            $mail->Password = 'research2CMS'; // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom('research@noreply.com', 'research');

            $mail->isHTML(true);  // Set email format to HTML
            $bodyContent = '<h1>Your username is '.$username.' and your password is '.$password.' <br>Use the following URL too login into the system http://localhost/DaSilva_G_Teves_J_3014_r2/admin/admin_login.php';


            $mail->Subject = 'Welcome to the Movie CMS';
            $mail->addAddress($email);   // Add a recipient
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
                
            }

           //End of php mailer
        redirect_to('./index.php');
       }else{
           echo 'Something went wrong, please try again';
       }

        
    
    
 
}

function getSingleUser($id){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: run the proper SQL query to fetch the user based on $id
    $get_user_query = 'SELECT * FROM `tbl_user` WHERE user_id =:id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id
        )
        );
   
    //TODO: return the user data if the above query went through
    if($get_user_result && $get_user_set->rowCount()){
        return $get_user_set;
    }else{
        // otherwise, return some error message
        return false;
    }
    
}

function editUser($id, $fname, $username, $email, $password){
    //TODO: get the database conn
    $pdo = Database::getInstance()->getConnection();
    
    $password = encrypt($password);
    
    //TODO Run the proper Query to update the tbl_user
    $update_user_query = 'UPDATE `tbl_user` SET user_fname = :fname, user_name = :username, user_email = :email, user_pass=:password WHERE user_id=:id';
    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':id'=>$id,
            ':fname'=>$fname,
            ':username'=>$username,
            ':email'=>$email,
            ':password'=>$password
        )
        );
    //TODO: if the update goes through, return redirect user to index.php
    if($update_user_result){
      
        redirect_to('./index.php');
    }else{
        //otherwise, display some error msg
        return 'Something went wrong, please try again.';
    }
    
}

function getAllUsers(){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: run the proper SQL query to fetch the user based on $id
    $get_user_query = 'SELECT * FROM `tbl_user`';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute();
   
    //TODO: return the user data if the above query went through
    if($get_user_result && $get_user_set->rowCount()){
        return $get_user_set;
    }else{
        // otherwise, return some error message
        return false;
    }
    
}

function deleteUser($id, $user_id){
    if($id === $user_id){
        $message = 'You are trying to erase yourself';
        return $message;
    }else{
    $pdo = Database::getInstance()->getConnection();
    $delete_stmt = 'DELETE from `tbl_user` WHERE user_id = :id';
    $delete_query = $pdo->prepare($delete_stmt);
    $delete_query->execute(
        array(
            ':id'=>$id
        )
        );
    }
    
}