<?php
    include("conn.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $query = "delete from crud where id = '$id'";
        $result = mysqli_query($conn, $query);
    }
?>