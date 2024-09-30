<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main for Select</title>
    
    <?php
        include("conn.php");
    ?>
</head>
<body>
    <h1>CRUD for Select</h1>
    <br>
    <h3>Students Information</h3>
    <a href="insert.php"><button>Add Students</button></a>
    
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Section</th>
            <th>Course</th>
        </tr>

        
        <?php
            $query = "select * from crud";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['section']?></td>
                        <td><?php echo $row['course']?></td>
                        <td><a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $row['id']?>">Update</a></td>
                    </tr>
                <?php
            }

        ?>
    </table>

</body>
</html>