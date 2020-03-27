<?php
require_once '../load.php';
confirm_logged_in();

if(isset($_POST['submit'])){
    $place_name = trim($_POST['placename']);
    $lat = trim($_POST['lat']);
    $lng = trim($_POST['lng']);
    
    if(empty($place_name) || empty($lat) || empty($lng)){
        $message = 'Please fill all the fields';
    }else{
        addMarker($place_name, $lat, $lng);
        //All data are pre-processed, and good to go
        //send it to the user creating API
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Markers</title>
</head>
<body>
    <h1>Add a new marker</h1>
<?php echo !empty($message)? $message:''; ?>
<form action="admin_addmarkers.php" method="post">
        <label>Place Name:</label><br>
        <input type="text" name="placename" value=""><br>

        <label>Lat:</label><br>
        <input type="text" name="lat" value=""><br>

        <label>Lng:</label><br>
        <input type="text" name="lng" value=""><br>

        

        <button name="submit" type="submit">Add Marker</button>
    </form>

    
</body>
</html>