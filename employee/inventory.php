<?php
    include 'header.php';
?>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Inventory
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#additem"><i class="fa fa-plus-circle"></i> Add Item</button>
				</span>
			</h1>
            <table width="100%" class="table table-striped table-bordered table-hover" id="item_table">
                <thead>   
      <tr>
                <th>Quantity</th>
                <th>Unit</th>
				<th>Description</th>
				<th>Serial Number</th>
				<th>Model Number</th>
				<th>D/P</th>
				<th>Remarks</th>
				<th>Category</th>
				<th>Action</th>
         </tr>
        </thead>
        <tbody>  
        </tbody>
        </table>
        <div class="modal fade" id="delitem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <!-- <div> -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Delete Item</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h5><center>Description: <strong><?php echo $row['description']; ?></strong></center></h5>
					<form role="form" method="POST" action="deleteproduct.php">
                </div>                 
				</div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>    
					</form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Item -->
    <div class="modal fade" id="edititem <?php echo $row['itemid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Edit Item</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edititem.php <?php echo '?item='.$row['itemid'];?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Quantity:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($row['Qty']); ?>" class="form-control" name="qty">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Category:</span>
                            <select style="width:400px;" class="form-control" name="category">
								<option value="<?php echo $row['category']; ?>"></option>
								<?php
                                
									$sql ="SELECT * FROM item WHERE category != '".$row['category']."'";
                                    $result = $con->query($sql);
									while($x = $result->fetch_assoc()){
										?>
											<option value="<?php echo $x['category']; ?>">
                      <?php echo $x['category']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>
						<div style="height:10px;"></div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Description:</span>
                            <input type="text" style="width:400px;" value="<?php echo $row['Description'] ?>" class="form-control" name="desc">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Serial Number:</span>
                            <input type="text" style="width:400px;" value="<?php echo $row['SerialNumber'] ?>" class="form-control" name="snum">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Unit:</span>
                            <input type="text" style="width:400px;" value="<?php echo $row['Unit'] ?>" class="form-control" name="unit">
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Model Number:</span>
                            <input type="text" style="width:400px;" value="<?php echo $row['ModelNumber'] ?>" class="form-control" name="mnum">
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Date Purchase:</span>
                            <input type="date" style="width:400px;" value="<?php echo $row['D_P'] ?>" class="form-control" name="dpase">
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Remarks:</span>
                            <input type="text" style="width:400px;" value="<?php echo $row['Remarks'] ?>" class="form-control" name="remarks">
                        </div>
						<div style="height:10px;"></div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
					</form>
                </div>
        </div>
    </div>
        <?php
        ?>
        
         
        </div>
        </div>
</div>
   </div>
    </div>

<?php
    include 'modal.php';
    include 'footer.php';
?>

<script>
    $(document).ready(function() {
        $('#item_table').DataTable({
            "processing": true,
            "serverSide": true,
            "bStateSave": true,
            order: [
                [0, 'desc']
            ],
            "ajax": "fetchitem_process.php",

        });

    });
</script>