<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <?php
        include("connection.php");
    ?>
</head>
<body>
    <?php
        $id = $_GET['id'];

        $query = "SELECT * FROM students WHERE student_id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="update.php?id_get=<?php echo $id;?>" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" value="<?php echo $row['first_name']?>">
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" value="<?php echo $row['last_name']?>">
        <br><br>
        <label for="birth">Date of Birth:</label>
        <input type="date" name="birth" id="birth" value="<?php echo $row['date_of_birth']?>">
        <br><br>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" value="<?php echo $row['section']?>">
        <br><br> 
        <input type="submit" name="Submit">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $id = $_GET['id_get'];
            
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $birth = $_POST["birth"];
            $section = $_POST["section"];

            $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', date_of_birth = '$birth', section = '$section' WHERE student_id = '$id'";

            if ($conn ->query($query)){
                echo "Updated Successfully";
            }
        }
    ?>

    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>