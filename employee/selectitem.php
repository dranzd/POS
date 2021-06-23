<?php
    include '../connection.php';
    if(!isset($_SESSION)){
    session_start();
    }

    $sql = "SELECT * FROM item ";
    $result = $con->query($sql);
    // echo json_encode($result);
    $data = [];
    $i = 0;
    while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $data[$i][0] = $rows[1];
        $data[$i][1] = $rows[2];
        $data[$i][2] = $rows[3];
        $data[$i][3] = $rows[4];
        $data[$i][4] = $rows[5];
        $data[$i][5] = $rows[6];
        $data[$i][6] = $rows[7];
        $data[$i][7] = $rows[8];
        $data[$i][8] = $rows[9];
        $i++;
    }
    mysqli_free_result($result);
	mysqli_close($con); 
    echo json_encode($data);

?>