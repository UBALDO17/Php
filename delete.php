<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>

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
    
    <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $query = "DELETE FROM crud WHERE id = '$id'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>window.location.href='index.php'</script>";                
            }
        }
    ?>
</body>
</html>