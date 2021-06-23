     <!-- Add Product -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
           <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addproduct.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Category:</span>
                            <select style="width:400px;" class="form-control" name="category">
								<?php
									 $sql = "SELECT * FROM category";
                                     $result = $con->query($sql);
									while($row = $result->fetch_assoc()){
										?>
											<option value="<?php echo $row['categoryid']; ?>">
                                            <?php echo $row['category_name']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Price:</span>
                            <input type="text" style="width:400px;" class="form-control" name="price" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Quantity:</span>
                            <input type="text" style="width:400px;" class="form-control" name="qty">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
                        </div>            
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>

        <!-- Add Customer -->
        
    <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Add New Customer</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addcustomer.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contact">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:400px;" class="form-control" name="username" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>  						
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
					</form>
                </div>
			</div>
		</div>
    </div>
            <!-- Add Item -->
    <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        
           <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Add New Item</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="additem.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Quantity:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="qty" >
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Category:</span>
                            <input type="text" style="width:400px;" class="form-control" name="category" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Unit:</span>
                            <input type="text" style="width:400px;" class="form-control" name="unit" >
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Description:</span>
                            <input type="text" style="width:400px;" class="form-control" name="desc">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Serial Number:</span>
                            <input type="text" style="width:400px;" class="form-control" name="snum">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Model Number:</span>
                            <input type="text" style="width:400px;" class="form-control" name="mnum">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Date Purchase:</span>
                            <input type="text" style="width:400px;" class="form-control" name="dpase">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Remarks:</span>
                            <input type="text" style="width:400px;" class="form-control" name="remarks">
                        </div>         
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
					</form>
                </div>
			</div>
		</div>
    </div>
    
