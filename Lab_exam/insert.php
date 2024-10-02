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
        <input type="text" name="section" id="section"><br>
        <label for="sub_t">Subject Title:</label><br>
        <input type="text" name="sub_t" id="sub_t"><br>
        <label for="sub_d">Subject Description:</label><br>
        <input type="text" name="sub_d" id="sub_d"><br>
        <label for="ins">Instructor:</label><br>
        <input type="text" name="ins" id="ins"><br>
        <label for="enroll">Date of Enrollment:</label><br>
        <input type="date" name="enroll" id="enroll"><br><br>
        <input type="submit" name="Submit">
    </form>

    <?php
        include("conn.php");
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $birth = $_POST["birth"];
            $section = $_POST["section"];
            $sub_t = $_POST["sub_t"];
            $sub_d = $_POST["sub_d"];
            $ins = $_POST["ins"];
            $enroll = $_POST["enroll"];

            $query1 = "INSERT INTO students (first_name, last_name, date_of_birth, section) VALUES ('$fname', '$lname', '$birth', '$section')";

            if (mysqli_query($conn, $query1)) {
                $student_id = mysqli_insert_id($conn);

                $query2 = "INSERT INTO subjects (subject_title, subject_desc, instructor) VALUES ('$sub_t', '$sub_d', '$ins')";

                if (mysqli_query($conn, $query2)) {
                    $subject_id = mysqli_insert_id($conn);
                    
                    $query3 = "INSERT INTO enrollment (student_id, subject_id, date_of_enrollment) VALUES ('$student_id', '$subject_id', '$enroll')";

                    if (mysqli_query($conn, $query3)) {
                        echo "Inserted Successfully";
                    }
                }
            }   
        }
    ?>

    <br>
    <a href="main.php"><button>Back to Main Page</button></a>
</body>
</html>