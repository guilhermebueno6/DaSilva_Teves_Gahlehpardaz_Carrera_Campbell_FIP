<?php
require_once '../load.php';
require_once 'scripts/encryption.php';
$ip = $_SERVER['REMOTE_ADDR'];


if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if(!empty($username) && !empty($password)){
        //Encrypt it
        $password = encrypt($password);
        //do the login here
        $message = login($username, $password, $ip);
    }else{
        $message = 'Please fill out the required fields';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the Login page</title>
</head>
<body>
<?php echo !empty($message)?$message:'';?>
<form action="admin_login.php" method="post">
    <label>Username:</label><br>
    <input type="text" name="username" value=""><br>

    <label>Password:</label><br>
    <input type="password" name="password" value=""> <br>

    <button name="submit">Log In</button>
</form>
    
</body>
</html>