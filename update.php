<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <?php 
        include ("cdn.php");
        include ("connection.php");
    ?>
</head>
<body>

    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM crud WHERE id = $id";
            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_assoc($result);
            
        }
    ?>

    <div class="container">
        <h2>Update Data into MySQL</h2>
        <form action="update.php?id_get=<?php echo $id;?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo $row['name'];?>"><br><br>
            
            <label for="course">Section:</label>
            <input type="text" id="section" name="section" required value="<?php echo $row['section'];?>"><br><br>

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required value="<?php echo $row['course'];?>"><br><br>
            
            <input type="submit" value="Update">
        </form>

        <hr>
        <a href="index.php"><button class="btn btn-primary">Back to Homepage</button></a>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_GET['id_get'])) {
                $id = $_GET['id_get'];
            }

            $name = $_POST['name'];
            $section = $_POST["section"];
            $course = $_POST["course"];

            $sql = "UPDATE crud SET name = '$name', section = '$section', course = '$course' WHERE id = '$id'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    ?>
</body>
</html>