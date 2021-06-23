<?php
    include '../connection.php';
    if(!isset($_SESSION)){
        session_start();
    }
	$item =$_GET['item'];

    $qty=$con -> real_escape_string($_POST['qty']);
	$category=$con -> real_escape_string($_POST['category']);
	$unit=$con -> real_escape_string($_POST['unit']);
	$description=$con -> real_escape_string($_POST['desc']);
	$serial=$con -> real_escape_string($_POST['snum']);
	$model=$con -> real_escape_string($_POST['mnum']);
	$datepurchase=$con -> real_escape_string($_POST['dpase']);
	$remarks=$con -> real_escape_string($_POST['remarks']);

    
    $sql ="UPDATE item SET Qty='".$qty."', category='".$category."', Unit='".$unit."', Description='".$description."',SerialNumber='".$serial."',ModelNumber='".$model."',D/P='".$datepurchase."',Remarks='".$remarks."' WHERE itemid='$item'";
    $rowupdate = $con->query($sql);
?>
    <script>
		     window.alert('Item updated successfully!');
			 window.history.back();
		</script>
        <?php
?>


