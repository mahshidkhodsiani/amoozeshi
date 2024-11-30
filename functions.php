<?php


function get_name($id){

    include "config.php";

    $query = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['name']." ".$row['family'];

}


function generateReferralCode() {
    // Generate three random uppercase letters
    $part1 = '';
    for ($i = 0; $i < 3; $i++) {
        $part1 .= chr(mt_rand(65, 90)); // ASCII range for uppercase letters
    }

    // Generate three random digits
    $part2 = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);

    // Generate two random lowercase letters followed by two random uppercase letters
    $part3 = '';
    for ($i = 0; $i < 2; $i++) {
        $part3 .= chr(mt_rand(97, 122)); // Lowercase letters
    }
    for ($i = 0; $i < 2; $i++) {
        $part3 .= chr(mt_rand(65, 90)); // Uppercase letters
    }

    // Concatenate all parts with hyphens
    return "{$part1}-{$part2}-{$part3}";
}

function tasfieh($id){
    include "config.php";

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row['tasfieh'];
    }else{
        return "No data found";
    }
}