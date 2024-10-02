<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>

    <?php
        include("connection.php");
    ?>
</head>
<body>
    <h1>This is the Adding Page</h1>
    <br>

    <form action="add.php" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname">
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname">
        <br><br>
        <label for="birth">Date of Birth:</label>
        <input type="date" name="birth" id="birth">
        <br><br>
        <label for="section">Section:</label>
        <input type="text" name="section" id="section">
        <br><br> 
        <label for="subject">Subjects:</label>
        <?php
            $query = "SELECT subject_id, subject_title FROM subjects";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <input type="checkbox" name="subject" id="subject" value="<?php echo $row['subject_id']?>">
                    <?php echo $row['subject_title']?>
                <?php
            }
        ?>

        <br><br>
        <input type="submit" name="Submit">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $birth = $_POST["birth"];
            $section = $_POST["section"];
            $subject = $_POST["subject"];

            $query = "INSERT INTO students stu subjects sub (stu.first_name, stu.last_name, stu.date_of_birth, stu.section sub.subject_title) VALUES ('$fname', '$lname', '$birth', '$section', $subject)";

            if ($conn ->query($query)){
                echo "Added Successfully";
            }
        }

    ?>
    <br>
    <a href="home.php"><button>Back to Home</button></a>
</body>
</html>