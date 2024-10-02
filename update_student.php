<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student details
    $query = "SELECT * FROM students WHERE student_id = $student_id";
    $result = $conn->query($query);
    $student = $result->fetch_assoc();

    // Fetch enrolled subjects for the student
    $enrolled_subjects = [];
    $enrollment_query = "SELECT subject_id FROM enrollment WHERE student_id = $student_id";
    $enrollment_result = $conn->query($enrollment_query);
    while ($row = $enrollment_result->fetch_assoc()) {
        $enrolled_subjects[] = $row['subject_id'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['section'];
    $subjects = $_POST['subjects']; // Array of selected subjects

    // Update student details
    $query = "UPDATE students SET 
              first_name = '$first_name', 
              last_name = '$last_name', 
              date_of_birth = '$date_of_birth', 
              section = '$section' 
              WHERE student_id = $student_id";
    $conn->query($query);

    // Clear old enrollments for the student
    $conn->query("DELETE FROM enrollment WHERE student_id = $student_id");

    // Insert updated enrollments
    foreach ($subjects as $subject_id) {
        $date_of_enrollment = date('Y-m-d');
        $query = "INSERT INTO enrollment (student_id, subject_id, date_of_enrollment) 
                  VALUES ('$student_id', '$subject_id', '$date_of_enrollment')";
        $conn->query($query);
    }

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>

    <h1>Update Student</h1>

    <form action="update_student.php" method="POST">
    <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required><br><br>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required><br><br>

    <label for="section">Section:</label>
    <input type="text" id="section" name="section" value="<?php echo $student['section']; ?>" required><br><br>

    <label for="subject">Select Subjects:</label><br>
    <?php
    // Fetch all subjects from the database
    $subject_query = "SELECT * FROM subjects";
    $subject_result = $conn->query($subject_query);

    while ($subject = $subject_result->fetch_assoc()) {
        $checked = in_array($subject['subject_id'], $enrolled_subjects) ? 'checked' : '';
        echo "<input type='checkbox' name='subjects[]' value='" . $subject['subject_id'] . "' $checked>"
            . "<strong>" . $subject['subject_title'] . "</strong> - " 
            . $subject['subject_desc'] . " (" . $subject['instructor'] . ")<br>";
    }
    ?><br><br>

    <input type="submit" value="Update Student">
</form>

</body>
</html>
