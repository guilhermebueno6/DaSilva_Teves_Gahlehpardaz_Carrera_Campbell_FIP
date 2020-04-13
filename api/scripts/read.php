<?php

function getAllPlaces(){
    $pdo = Database::getInstance()->getConnection();

    $markers_stmt = 'SELECT * FROM `tbl_place`';
    $markers_query = $pdo->query($markers_stmt);

    return $markers_query;
}

function getSinglePlace($id){
    $pdo = Database::getInstance()->getConnection();

    $single_marker_stmt = 'SELECT * FROM `tbl_place` WHERE place_id='.$id.'';
    $single_marker_query = $pdo->prepare($single_marker_stmt);
    $single_marker_query->execute(
        array(
            ':id'=>$id
        )
        );

    return $single_marker_query;
}

function addMarker($place_name, $lat, $lng){
    $pdo = Database::getInstance()->getConnection();

    $add_marker = 'INSERT INTO `tbl_place` VALUES (NULL,:place_name,:lat,:lng)';
    $add_marker_query = $pdo->prepare($add_marker);
    $add_marker_result = $add_marker_query->execute(
        array(
            ':place_name'=>$place_name,
            ':lat'=>$lat,
            ':lng'=>$lng
        )
        );
        // var_dump($add_marker_query);
        // exit;

        if($add_marker_result){
            redirect_to('./index.php');

        }else{
            echo 'Something went wrong';
        }
}

function editMarker($id, $place_name, $lat, $lng){
    $pdo = Database::getInstance()->getConnection();
    $edit_marker = 'UPDATE `tbl_place` SET place_name=:place_name, place_lat=:lat, place_lng=:lng WHERE place_id=:id';
    $edit_marker_query = $pdo->prepare($edit_marker);
    $edit_marker_result = $edit_marker_query->execute(
        array(
            ':id'=>$id,
            ':place_name'=>$place_name,
            ':lat'=>$lat,
            ':lng'=>$lng
        )
        );
    if(!$edit_marker_result){
        echo 'Something went wrong!';
    }
}

function deleteMarker($id){
    $pdo = Database::getInstance()->getConnection();
    $delete_marker = 'DELETE from `tbl_place` WHERE place_id = :id';
    $delete_marker_query = $pdo->prepare($delete_marker);
    $delete_marker_query->execute(
        array(
            ':id'=>$id
        )
        );
}