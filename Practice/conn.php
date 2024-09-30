<?php

$conn = new mysqli("localhost", "root","","php_practice");

if ($conn->connect_error) {
    die("Failed to Connect". $conn->connect_error);
} else {
    // echo "Succesfully connected";
}
?>