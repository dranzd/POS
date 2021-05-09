<div class="modal fade" id="delproduct_"<?php echo $row; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						 $sql = "SELECT * FROM product WHERE productid='$row'";
                         $result = $con->query($sql);
					?>
                    <h5><center>Product Name: <strong><?php echo $result['product_name']; ?></strong></center></h5>
					<form role="form" method="POST" action="../employee/deleteproduct.php<?php echo '?id='.$row; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
					</form>
                </div>
            </div>
        </div>
    </div>