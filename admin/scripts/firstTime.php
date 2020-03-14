<?php


function checkFirstTime($id){
    $pdo = Database::getInstance()->getConnection();
    

$select_logins = 'SELECT first_time FROM `tbl_user` WHERE user_id = :id';
$query_logins = $pdo->prepare($select_logins);
$query_logins->execute(
    array(
        ':id'=>$id
    )
    );
    $bool = implode($query_logins->fetch(PDO::FETCH_ASSOC));
    return $bool;
    

}


?>