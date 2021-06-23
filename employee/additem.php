<?php
    include '../connection.php';
    if(!isset($_SESSION)){
        session_start();
    }

    $qty=$con -> real_escape_string($_POST['qty']);
	$category=$con -> real_escape_string($_POST['category']);
	$unit=$con -> real_escape_string($_POST['unit']);
	$description=$con -> real_escape_string($_POST['desc']);
	$serial=$con -> real_escape_string($_POST['snum']);
	$model=$con -> real_escape_string($_POST['mnum']);
	$datepurchase=$con -> real_escape_string($_POST['dpase']);
	$remarks=$con -> real_escape_string($_POST['remarks']);

    $sql = "INSERT INTO item (qty,unit,description,serial_num,model_num,dp,Remarks,category) VALUES ('$qty','$unit','$description','$serial','$model','$datepurchase','$remarks','$category')";
    $row = $con->query($sql);
    ?>
        <script>
		     window.alert('Item added successfully!');
			 window.history.back();
		</script>
        <?php
?>

