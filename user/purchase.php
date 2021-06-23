<?php
    include '../connection.php';
    session_start();
    if(isset($_POST['purchase'])){
            $total = $_POST['sales'];
            $idd =  $_SESSION['id'];
            $sql1="INSERT INTO sales(salesid,userid,sales_total,sales_date) VALUES (null, '$idd', '$total', NOW())";
            if($con->query($sql1) === TRUE){
                ?>
                <script>
                    window.alert('Your purchase is successful!');
                    window.history.back();
                </script>
           <?php }  
            else {
                echo "Error: " . $sql1 . "<br>" . $con->error;
              }
              ?>
       
       
	<?php
    }
?>