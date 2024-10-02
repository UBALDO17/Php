<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>
    <h1>Simple CRUD Operation</h1>
    <hr>
    <h3>Student Information</h3>
    <p></p>
    <?php
        include("conn.php");
        $id = $_GET['id'];

        $query = "SELECT * FROM students WHERE student_id = '$id'";
        $result = ($conn ->query($query));
        $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method=post>
        <label for="fname">First Name:</label><br>
        <input type="text" name="fname" id="fname" value="<?php echo $row['first_name'];?>"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" name="lname" id="lname" value="<?php echo $row['last_name'];?>"><br>
        <label for="birth">Date of Birth:</label><br>
        <input type="date" name="birth" id="birth" value="<?php echo $row['date_of_birth'];?>"><br>
        <label for="section">Section:</label><br>
        <input type="text" name="section" id="section" value="<?php echo $row['section'];?>"><br><br>
        <input type="submit" name="Submit">
    </form>

    <?php
        if ($_SERVER ['REQUEST_METHOD'] == 'POST'){

            $fname = $_POST ['fname'];
            $lname = $_POST ['lname'];
            $birth = $_POST ['birth'];
            $section = $_POST ['section'];

            $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', date_of_birth = '$birth', section = '$section' WHERE student_id = '$id'";

            if ($conn -> query($query)) {
                echo "Updated Succesfully";
            } else {
                echo "Failed to Update";
            }
        }
    ?>
    <br>
    <a href="main.php"><button>Back to Main Page</button></a>
</body>
</html>