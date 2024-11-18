<?php
// $servername = "188.212.22.179";
// $username = "uogsncxd_admin";
// $password = "HlVAj$03N{VB";
// $dbname = "uogsncxd_db";

// $cfg['Lang'] = 'fa';
// $cfg['Charset'] = 'utf8mb4';


// $conn = mysqli_connect($servername, $username, $password, $dbname);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $conn->set_charset("utf8");



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rich";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
