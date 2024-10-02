<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Form</title>
</head>
<body>

 <h1>Student Enrollment Form</h1>

    <form action="handle_student.php" method="POST">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" required><br><br>

    <label for="section">Section:</label>
    <input type="text" id="section" name="section" required><br><br>

    <label for="subject">Select Subjects:</label><br>
    <?php
    // Fetch all subjects from the database
    include 'connection.php';
    $subject_query = "SELECT * FROM subjects";
    $subject_result = $conn->query($subject_query);

    while ($subject = $subject_result->fetch_assoc()) {
        echo "<input type='checkbox' name='subjects[]' value='" . $subject['subject_id'] . "'>" 
            . "<strong>" . $subject['subject_title'] . "</strong> - " 
            . $subject['subject_desc'] . " (" . $subject['instructor'] . ")<br>";
    }
    ?><br><br>

    <input type="submit" value="Submit">
</form>


<style>
    table,tr,th{
        border-collapse: collapse; 
    }
</style>


<h2>Enrolled Students</h2>

<table border="1">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Section</th>
            <th>Subjects</th>
            <th>Descriptions</th>
            <th>Instructors</th>
            <th>Date of Enrollment</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'connection.php';
        $query = "
            SELECT 
                students.student_id, 
                first_name, 
                last_name, 
                date_of_birth, 
                section,
                GROUP_CONCAT(subjects.subject_title SEPARATOR ', ') AS subjects,
                GROUP_CONCAT(subjects.subject_desc SEPARATOR ', ') AS descriptions,
                GROUP_CONCAT(subjects.instructor SEPARATOR ', ') AS instructors,
                MAX(enrollment.date_of_enrollment) AS date_of_enrollment
            FROM students
            JOIN enrollment ON students.student_id = enrollment.student_id
            JOIN subjects ON enrollment.subject_id = subjects.subject_id
            GROUP BY students.student_id
        ";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['subjects'] . "</td>"; // Displays concatenated subjects
            echo "<td>" . $row['descriptions'] . "</td>"; // Displays concatenated descriptions
            echo "<td>" . $row['instructors'] . "</td>"; // Displays concatenated instructors
            echo "<td>" . $row['date_of_enrollment'] . "</td>";
            echo "<td>
                    <a href='delete_student.php?id=" . $row['student_id'] . "'>Delete</a> | 
                    <a href='update_student.php?id=" . $row['student_id'] . "'>Update</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>




</body>
</html>
