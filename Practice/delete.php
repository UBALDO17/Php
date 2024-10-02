<?php
    include("conn.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $query = "delete from crud_db where id = '$id'";
        $result = mysqli_query($conn, $query);
    }
?>