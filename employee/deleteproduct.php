<?php
include '../connection.php';
    $id = $_GET['id'];
    // sql to delete a record
    $sql = "DELETE FROM product WHERE productid=$id";

    if ($con->query($sql) === TRUE) {
    header("Location: ../employee/showproduct.php");
    } else {
    echo "Error deleting record: " . $con->error;
    }
    ?>