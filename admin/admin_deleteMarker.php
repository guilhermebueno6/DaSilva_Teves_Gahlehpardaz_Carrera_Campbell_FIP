<?php
require_once '../load.php';
confirm_logged_in();



$placeList = getAllPlaces();

if (isset($_GET['id'])){
    $id = trim($_GET['id']);
    deleteMarker($id);
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Markers</title>
</head>
<body>

    <?php while($row = $placeList->fetch(PDO::FETCH_ASSOC)):?>
            <ul>
            <li>Name: <?php echo $row['place_name'];?> </li>
            <li>Lat: <?php echo $row['place_lat'];?> </li>
            <li>Lng: <?php echo $row['place_lng']; ?></li>
            <li><a href="admin_deleteMarker.php?id=<?php echo $row['place_id']; ?>">Delete Marker</a></li>
            </ul>
     
        
    <?php endwhile;?>


    


</body>
</html>