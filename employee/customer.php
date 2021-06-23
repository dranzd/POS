<?php
    include 'header.php'; 
?>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customers
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addcustomer"><i class="fa fa-plus-circle"></i> Add Customer</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>Table Number</th>
                        <th>Username</th>
						<th>Address</th>
                        <!-- <th>Contact Info</th> -->
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sql = "SELECT * FROM customer LEFT JOIN users ON users.id=customer.userid ";
					$result = $con->query($sql);
                    if ($result->num_rows >0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
						<tr>
							<td><?php echo $row['tablenumber']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['address']; ?></td>
							<!-- <td><?php echo $row['contact']; ?></td> -->
							<td>
								<!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $row['userid']; ?>"><i class="fa fa-edit"></i> Edit</button> -->
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $row['userid']; ?>"><i class="fa fa-trash"></i> Delete</button>
							</td>
						</tr>
                    <!-- Delete Customer -->
                        <div class="modal fade" id="del_<?php echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Delete Customer</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h5><center>Customer Name: <strong><?php echo ucwords($row['customer_name']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletecustomer.php<?php echo '?id='.$row['userid']; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
					</form>
                </div>
            </div>
        </div>
    </div>
					<?php
                        }
                    }
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php
	include 'modal.php';
    include 'footer.php';
?>