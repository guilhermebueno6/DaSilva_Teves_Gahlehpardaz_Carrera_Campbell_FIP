<?php
require_once '../load.php';
confirm_logged_in();



$placeList = getAllPlaces();

if (isset($_GET['id'])){
    $id = trim($_GET['id']);
    $targetMarker = getSinglePlace($id);
}

if(isset($_POST['submit'])){
    $id = trim($_POST['id']);
    $place_name = trim($_POST['placename']);
    $lat = trim($_POST['lat']);
    $lng = trim($_POST['lng']);

    editMarker($id, $place_name, $lat, $lng);
    
}

// if (isset($_GET['id'])){
//     $id = trim($_GET['id']);
//     $delete_user_result = deleteUser($id,$user_id);
    
// }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Markers</title>
</head>
<body>
<?php if(!isset($_GET['id'])):?>
    <?php while($row = $placeList->fetch(PDO::FETCH_ASSOC)):?>
            <ul>
            <li>Name: <?php echo $row['place_name'];?> </li>
            <li>Lat: <?php echo $row['place_lat'];?> </li>
            <li>Lng: <?php echo $row['place_lng']; ?></li>
            <li><a href="admin_editmarkers.php?id=<?php echo $row['place_id']; ?>">Edit Marker</a></li>
            </ul>
     
        
    <?php endwhile;?>
<?php endif;?>

    <?php if(isset($_GET['id'])):?>
        <?php while($row = $targetMarker->fetch(PDO::FETCH_ASSOC)):?>
            <form action="admin_editmarkers.php" method="post">
        <label>Place Name</label>
        <input type="text" name="placename" value="<?php echo $row['place_name'];?>"><br><br>

        <label>Lat</label>
        <input type="text" name="lat" value="<?php echo $row['place_lat'];?>"><br><br>

        <label>Lng</label>
        <input type="text" name="lng" value="<?php echo $row['place_lng'];?>"><br><br>

        <label>Key</label>
        <input type="text" name="id" value="<?php echo $row['place_id'];?>"><br><br>

        

        <button type="submit" name="submit">Edit Marker</button>
        </form>
        <?php endwhile;?>


    <?php endif;?>


</body>
</html>