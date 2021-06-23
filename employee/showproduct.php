<?php
  include '../employee/header.php';
?>
   <div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Products
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Add Product</button>
				</span>
			</h1>
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable1">
                <thead>   
      <tr>
                <th>Product Name</th>
                <th>Price</th>
				<th>Quantity</th>
				<th>Photo</th>
				<!-- <th>Action</th> -->
                    </tr>
        </thead>
        <tbody>                    
          <?php
          $sql = "SELECT * FROM product LEFT JOIN category ON category.categoryid=product.categoryid";
          $result = $con->query($sql);
          
          if ($result->num_rows >0) {
            
            foreach ($result as $row) {        
                  ?>
        <tr>
            
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo number_format($row['product_price'],2); ?></td>
							<td><?php echo $row['product_qty']; ?></td>
							<td><img src="../images/<?php if(empty($row['photo'])){
                                echo "../images/noname.jpg";
                                }
                                else{
                                    echo $row['photo'];
                                    } ?>
                                " height="90px" width="80px;"></td>
              <!-- <td> -->
								<!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $row['productid']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $row['productid']; ?>"><i class="fa fa-trash"></i> Delete</button> -->

							<!-- </td> -->

        </tr>
        <div class="modal fade" id="delproduct_<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <!-- <div> -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h5><center>Product Name: <strong><?php echo $row['product_name']; ?></strong></center></h5>
					<form role="form" method="POST" action="../employee/deleteproduct.php<?php echo '?id='.$row['productid']; ?>">
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

    <!-- Edit Product -->
    <div class="modal fade" id="editprod_<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title" id="myModalLabel">Edit Product</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="editproduct.php<?php echo '?id='.$row['productid']; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Product Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($row['product_name']); ?>" class="form-control" name="name">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Category:</span>
                            <select style="width:400px;" class="form-control" name="category">
								<option value="<?php echo $row['categoryid']?>"><?php echo $row['category_name']; ?></option>
								<?php
                                
									$sql ="SELECT * FROM category WHERE categoryid != '".$row['categoryid']."'";
                                    $result = $con->query($sql);
									while($x = $result->fetch_assoc()){
										?>
											<option value="<?php echo $x['categoryid']; ?>">
                      <?php echo $x['category_name']; ?></option>
										<?php
									}
								?>
							</select>
                        </div>
						<div style="height:10px;"></div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Price:</span>
                            <input type="number" style="width:400px;" value="<?php echo $row['product_price'] ?>" class="form-control" name="price">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Quantity:</span>
                            <input type="number" style="width:400px;" value="<?php echo $row['product_qty'] ?>" class="form-control" name="qty">
                        </div>
						<div style="height:10px;"></div>					
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Photo:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
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
  include '../employee/footer.php';
?>