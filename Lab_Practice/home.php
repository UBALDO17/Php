<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <?php
        include("connection.php");
    ?>
</head>
<body>
    <h1>This is the Main Page</h1>
    <h3>Student Information</h3>
    <br>

    <a href="add.php"><button>Add Students</button></a>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Section</th>
            <th>Enrollment</th>
            <th>Subject</th>
            <th>Instructor</th>
            <th>Actions</th>
        </tr>

        <?php
            $query = "SELECT stu.*, enr.date_of_enrollment, sub.subject_title, sub.instructor FROM students stu, enrollment enr, subjects sub WHERE stu.student_id=enr.student_id AND enr.subject_id=sub.subject_id";
            
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['student_id']?></td>
                        <td><?php echo $row['first_name']?></td>
                        <td><?php echo $row['last_name']?></td>
                        <td><?php echo $row['date_of_birth']?></td>
                        <td><?php echo $row['section']?></td>
                        <td><?php echo $row['date_of_enrollment']?></td>
                        <td><?php echo $row['subject_title']?></td>
                        <td><?php echo $row['instructor']?></td>
                        <td><a href="delete.php?id=<?php echo $row['student_id']?>">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $row['student_id']?>">Update</a></td>
                    </tr>
                <?php
            }
        ?>

    </table>
</body>
</html>