<?php
    require_once '../load.php';
    confirm_logged_in();
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome <?php echo $_SESSION['user_name'];?></h2>
<?php echo !empty($message)?$message:'';?>

<a href="admin_logout.php">Log out</a>
<a href="admin_createuser.php">Create User</a>
<a href="admin_edituser.php">Edit my Account</a>
<a href="admin_deleteuser.php">Delete User</a><br><br>
<a href="admin_addmarkers.php">Add Markers</a>
<a href="admin_editmarkers.php">Edit Markers</a>
<a href="admin_deleteMarker.php">Delete Marker</a><br><br>
<a href="">Add Event</a>
<a href="">Edit Event</a>
<a href="">Delete Event</a>

    
</body>
</html>