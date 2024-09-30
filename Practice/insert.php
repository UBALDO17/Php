<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>

    <?php
        include("conn.php");
    ?>
</head>
<body>
    <h1>CRUD for Insert</h1>
    <br>
    <h3>Insert to Database</h3>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="section">Section:</label>
        <input type="text" name="section" id="section">
        <label for="course">Course:</label>
        <input type="text" name="course" id="course">
        <button type="submit">Submit</button>
    </form>
    <?php   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST["name"];
            $section = $_POST["section"];
            $course = $_POST["course"];

            $query = "insert into crud (name, section, course) values ('$name', '$section', '$course')";
            if ($conn ->query($query)) {
                echo "Added Successfully";
            }

        }
    ?>

    <a href="index.php"><button>Back to Homepage</button></a>
</body>
</html>