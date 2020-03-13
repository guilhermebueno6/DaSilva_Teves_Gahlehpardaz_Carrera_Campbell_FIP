<?php
require_once '../load.php';
confirm_logged_in();

$user_id = $_SESSION['user_id'] 

$userList = getAllUsers();

if(!$userList){
    $message = 'Something Went Wrong';
}

if (isset($_GET['id'])){
    $id = trim($_GET['id']);
    $delete_user_result = deleteUser($id,$user_id);
    if(!$delete_user_result){
        $message = 'Failed to delete user';
    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
<h2>Remove User</h2>
<h1>Users</h1>
<?php echo !empty($message)? $message:''; ?>
<?php if($userList):?>
    
<table>
    <thead>
        <tr>
            <td>User ID</td>
            <td>User Name</td>
            <td>User Email</td>
            <td>Delete</td>
        </tr>
    </thead>

<?php while($row = $userList->fetch(PDO::FETCH_ASSOC)):?>
    <tbody>
        <tr> 
            <td><?php echo $row['user_id'];?> </td>
            <td><?php echo $row['user_name'];?> </td>
            <td><?php echo $row['user_email']; ?></td>
            <td><a href="admin_deleteuser.php?id=<?php echo $row['user_id']; ?>">Delete</a></td>
        </tr> 
    </tbody>
        
<?php endwhile;?>

</table>
<?php endif;?>

</body>
</html>

