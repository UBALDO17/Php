<?php
    include("connection.php");

    $id = $_GET['id'];

    $query = "DELETE FROM students WHERE student_id = '$id'";

    if ($conn ->query($query) == TRUE) {
        echo "<script>window.location.href='home.php'</script>";
    } else {
        echo "Failed to Delete";
    }
?>