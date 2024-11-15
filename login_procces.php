<?php
session_start();

include "config.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password); // "ss" means two strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_data'] = $row;
        header("Location: index.php");
        exit();
    } else {
        echo "پسورد یا یوزر نیم نامعتبر است!";
    }
}
