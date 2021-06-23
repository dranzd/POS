<?php
	include '../connection.php';
	
	$name=$con -> real_escape_string($_POST['name']);
	$address=$con -> real_escape_string($_POST['address']);
	$contact=$con -> real_escape_string($_POST['contact']);
	$username=$con -> real_escape_string($_POST['username']);
	$password=$con -> real_escape_string($_POST['password']);
	
	$sql="INSERT INTO users (username, password, access) VALUES ('$username', '$password', 'Customer')";
	if($con->query($sql)=== TRUE){
		$last_id = $con->insert_id;
		$sql1="INSERT INTO customer (userid, customer_name, address, contact) VALUES ( '$last_id', '$name','$address', '$contact')";
		$con->query($sql1);
	}
	?>
		<script>
			window.alert('Customer added successfully!');
			window.history.back();
		</script>
	<?php
?>