<?php
function timeOut($id){
    $pdo = Database::getInstance()->getConnection();
   

    $stmt = 'SELECT user_date FROM `tbl_user` WHERE user_id=:id';
    $query = $pdo->prepare($stmt);
    $query->execute(
        array(
            ':id'=>$id
        )
        );
    $firstLogin = implode($query->fetch(PDO::FETCH_ASSOC));

    $now = date("yy-m-d h:i:s");
    $now = strtotime($now);
    $firstLogin = strtotime($firstLogin);
    $diff = $now - $firstLogin;
    return $diff;
}