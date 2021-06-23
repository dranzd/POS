<?php
	include '../connection.php';
	if (!isset($_SESSION)) {
		session_start();
	}

    $name=$con -> real_escape_string($_POST['name']);
	$category=$con -> real_escape_string($_POST['category']);
	$price=$con -> real_escape_string($_POST['price']);
	$qty=$con -> real_escape_string($_POST['qty']);
	
	$fileInfo = $con -> real_escape_string(PATHINFO($_FILES["image"]["name"]));
	$location="";
	if (!empty($_FILES["image"]["name"])){
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_ ." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $newFilename);
			$location = "../images/" . $newFilename;
		}
		else{
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}

		
	$sql ="INSERT INTO product (product_name,categoryid,product_price,product_qty,photo) VALUES ('$name','$category','$price','$qty','$location')";
	$row = $con->query($sql);
	$sql1 ="INSERT INTO inventory (userid, ACTION, productid, quantity, inventory_date) VALUES ('".$_SESSION['id']."', 'Add Product', '$row', '$qty', NOW())";
	$row1 = $con->query($sql1);
	?>
		<script>
			window.alert('Product added successfully!');
			 window.history.back();
		</script>
	<?php
?>
    