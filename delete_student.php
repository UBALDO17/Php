<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Delete the student from the students table
    $query = "DELETE FROM students WHERE student_id = $student_id";
    $conn->query($query);

    header("Location: index.php");
}
?>
