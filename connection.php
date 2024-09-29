<?php
    $conn = new mysqli("localhost", "root", "", "php_practice");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn ->connect_error);
    } else {
        // echo "Connected successfully";
    }

?>