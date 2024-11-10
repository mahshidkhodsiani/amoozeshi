<?php


function get_name($id){

    include "config.php";

    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['name']." ".$row['family'];

}