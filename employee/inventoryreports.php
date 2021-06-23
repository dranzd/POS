<?php
    include '../employee/header.php';
?>
            <div id="page-wrapper">
                 <div class="container-fluid">
            <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Inventory Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Date</th>
						<th>User</th>
                        <th>Action</th>
						<th>Product Name</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					$sql="SELECT * FROM inventory LEFT JOIN product ON product.productid=inventory.productid ORDER BY inventory_date DESC";
                    $result=$con->query($sql);
                    if($result->num_rows >0)
					while($row = $result->fetch_assoc()){
					?>
						<tr>
							<td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($row['inventory_date'])); ?></td>
							<td>
							<?php 
								$sql1="SELECT * FROM users LEFT JOIN customer ON customer.userid=users.id WHERE users.id='".$row['userid']."'";
								$result1=$con->query($sql1);
								if($result1->num_rows >0)
                                while ($row2 = $result1->fetch_assoc()) {
                                    if ($row2['access']== "Admin") {
                                        echo "Admin";
                                    } elseif ($row2['access']=="Customer") {
                                        echo $row2['customer_name'];
                                    } else {
                                        echo "Employee";
                                    } 
									
                                } ?>
							
							<td align="right"><?php echo $row['action']; ?></td>
									<td align="right"><?php echo $row['product_name']; ?></td>
									<td align="right"><?php echo $row['quantity']; ?></td>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
                 </div>
            </div>
<?php
    include '../employee/footer.php'
?>