<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <?php
        include("conn.php");
    ?>
</head>
<body>
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $query = "select * from crud_db where id = '$id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
        }
    ?>

    <h1>CRUD for Update</h1>
    <br>
    <h3>Update to Database</h3>
    <form action="update.php?id_get=<?php echo $id; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
        <label for="section">Section:</label>
        <input type="text" name="section" id="section" value="<?php echo $row['section']; ?>">
        <label for="course">Course:</label>
        <input type="text" name="course" id="course" value="<?php echo $row['course']; ?>">
        <button type="submit">Submit</button>
    </form>

    <?php   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(isset($_GET['id_get'])){
                $id = $_GET['id_get'];
            }

            $name = $_POST["name"];
            $section = $_POST["section"];
            $course = $_POST["course"];

            $query = "update crud_db set name = '$name', section = '$section', course = '$course' where id = '$id'";

            if ($conn ->query($query)) {
                echo "Updated Successfully";
            }
        }
    ?>

    <a href="index.php"><button>Back to Homepage</button></a>   
</body>
</html>