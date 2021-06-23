<?php
	include '../connection.php';
    if (!isset($_SESSION)) {
		session_start();
	}
	$id=$_GET['id'];
	
	
	
	$name=$con -> real_escape_string($_POST['name']);
	$category=$con -> real_escape_string($_POST['category']);
	$price=$con -> real_escape_string($_POST['price']);
	$qty=$con -> real_escape_string($_POST['qty']);

    $sql ="SELECT * FROM product where productid='$id'";
	$row=$con->query($sql);
    if ($row) {
        while ($x = $row->fetch_assoc()) {
            $fileInfo = PATHINFO($_FILES["image"]["name"]);
    
            if (empty($_FILES["image"]["name"])) {
                $location=$row['photo'];
            } else {
                if ($fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "png") {
                    $newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
                    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $newFilename);
                    $location = "../images/" . $newFilename;
                } else {
                    $location=$row['photo']; ?>
                    <script>
                        window.alert('Photo not updated. Please upload JPG or PNG photo only!');
                    </script>
                <?php
                }
            }
        
            $sql ="UPDATE product SET product_name='".$name."', categoryid='".$category."', product_price='".$price."', product_qty='".$qty."',photo='".$location."' WHERE productid='$id'";
            $rowupdate = $con->query($sql);
            if ($rowupdate) {
                while ($x = $row->fetch_assoc()) {
                    if ($qty!=$row['product_qty']) {
                        $sql1 ="INSERT INTO inventory (userid,action,productid,quantity,inventory_date) VALUES ('".$_SESSION['id']."','Update Quantity', '$id', '$qty', NOW())";
                        $row1 = $con->query($sql1);
                    }
                } ?>
            <script>
                window.alert('Product updated successfully!');
                 window.history.back();
            </script>
        <?php
            }
        }
    }  
    ?>

	
