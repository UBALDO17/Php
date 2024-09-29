<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>

    <?php 
        include ("cdn.php");
        include ("connection.php");
    ?>
</head>
<body>
    <!-- Header -->
    <ion-header>
        <ion-toolbar color="tertiary">
            <ion-title style="text-align:center;">CRUD APPLICATION IN PHP</ion-title>
        </ion-toolbar>
    </ion-header>
    
    <div class="container">
    <h2>Insert Data into MySQL</h2>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="course">Section:</label>
        <input type="text" id="section" name="section" required><br><br>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required><br><br>
        
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>

    <hr>
    <a href="index.php"><button class="btn btn-primary">Back to Homepage</button></a>
    </div>


    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $section = $_POST["section"];
            $course = $_POST["course"];

            $sql = "INSERT INTO crud (name, section, course) VALUES ('$name', '$section', '$course')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    ?>

</body>
</html>