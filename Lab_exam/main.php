<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        table, tr, td, th{
            border-style: solid;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Simple CRUD Operation</h1>
    <hr>
    <h3>Student Information</h3>
    <a href="insert.php"><button>Add Students</button></a>
    <p></p>
    <table>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Section</th>
            <th>Actions</th>
        </tr>
        <?php
            include("conn.php");
            $query = "SELECT * FROM students";
            $result = ($conn ->query($query));
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['student_id']?></td>
                        <td><?php echo $row['first_name']?></td>
                        <td><?php echo $row['last_name']?></td>
                        <td><?php echo $row['date_of_birth']?></td>
                        <td><?php echo $row['section']?></td>
                        <td><a href="update.php?id=<?php echo $row['student_id']?>">Update</a> <a href="delete.php?id=<?php echo $row['student_id']?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>

</body>
</html>