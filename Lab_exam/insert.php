<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>
<body>
    <h1>Simple CRUD Operation</h1>
    <hr>
    <h3>Enter Student Information</h3>
    <p></p>
    <form action="insert.php" method="post">
        <label for="fname">First Name:</label><br>
        <input type="text" name="fname" id="fname"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" name="lname" id="lname"><br>
        <label for="birth">Date of Birth:</label><br>
        <input type="date" name="birth" id="birth"><br>
        <label for="section">Section:</label><br>
        <input type="text" name="section" id="section"><br><br>
        <input type="submit" name="Submit">
    </form>

    <?php
        include("conn.php");
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $birth = $_POST["birth"];
            $section = $_POST["section"];

            $query = "INSERT INTO students (first_name, last_name, date_of_birth, section) VALUES ('$fname', '$lname', '$birth', '$section')";

            if (mysqli_query($conn, $query)) {
                echo "Inserted Successfully!";
            }   
        }
    ?>

    <br>
    <a href="main.php"><button>Back to Main Page</button></a>
</body>
</html>