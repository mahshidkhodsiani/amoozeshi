<?php

include "config.php";

if (isset($_POST['invited'])) {
    $invited = $_POST['invited'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE invited_code = ?");

    $stmt->bind_param("s", $invited);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "yes";
    } else {
        echo "no";
    }
    $stmt->close();
}
