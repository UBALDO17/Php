<?php
    $conn = new mysqli("localhost", "root","","lab_php");

    if ($conn->connect_error) {
        die("Failed to connect". $conn->connect_error);
    } else {
        // echo "Successfull";
    }
?>