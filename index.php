<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

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
        <hr>
        <h5>Students Information</h5>
        <a href="insert.php" class="btn btn-primary">ADD Students</a>
        <hr>

        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Section</th>
                <th>Course</th>
            </tr>
            
            <?php

                $query = "SELECT * FROM crud ";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['section'];?></td>
                            <td><?php echo $row['course'];?></td>
                            <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Update</a> <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php
                }
            ?>


        </table>

    </div>

</body>
</html>