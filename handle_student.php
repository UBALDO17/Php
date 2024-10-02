<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['section'];
    $subjects = $_POST['subjects']; // This will be an array of selected subjects

    // Insert student into the students table
    $query = "INSERT INTO students (first_name, last_name, date_of_birth, section) 
              VALUES ('$first_name', '$last_name', '$date_of_birth', '$section')";
    $conn->query($query);
    $student_id = $conn->insert_id; // Get the last inserted student ID

    // Insert multiple enrollments (one for each selected subject)
    foreach ($subjects as $subject_id) {
        $date_of_enrollment = date('Y-m-d');
        $query = "INSERT INTO enrollment (student_id, subject_id, date_of_enrollment) 
                  VALUES ('$student_id', '$subject_id', '$date_of_enrollment')";
        $conn->query($query);
    }

    header("Location: index.php");
}
?>
