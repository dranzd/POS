<?php
include '../connection.php';
    session_start();
    $id = $_GET['id'];
    // sql to delete a record
    $sql = "DELETE FROM customer WHERE userid=$id";
    $con->query($sql);
    $sql1 = "DELETE FROM users WHERE id=$id";
    $con->query($sql1);
    

    if (isset($_POST['delete'])) {
     header("Location: customer.php");
    } else {
    echo "Error deleting record: " . $con->error;
    }
    ?>