<?php
    include '../employee/header.php';
?>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sales Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Sales Date</th>
						<th>Customer</th>
                        <th>Total Purchase</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>	
                <?php
                $sql = "SELECT * FROM sales LEFT JOIN customer ON customer.userid=sales.userid ORDER BY sales_date DESC";
                $result = $con->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()) { ?>
                    <tr>
                    <td class="hidden"></td>
							<td><?php echo date('M d, Y h:i A',strtotime($row['sales_date'])); ?></td>
							<td><?php echo $row['customer_name']; ?></td>
							<td align="right"><?php echo number_format($row['sales_total'],2); ?></td>
							<td>
								<a href="javascript:;" data-target="#detail<?php echo $row['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
							</td>
                     </tr>
                     </table>
        </div>
    </div>
                     <!-- Full Details -->
    <div class="modal fade" id="detail<?php echo $row['salesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
					<center><h4 class="modal-title" id="myModalLabel">Purchase Full Details</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<span>Customer: <strong><?php echo ucwords($row['customer_name']); ?></strong></span>
							<span class="pull-right">Date: <strong><?php echo date("F d, Y", strtotime($row['sales_date'])); ?></strong></span>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Purchase Qty</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$sql ="SELECT * FROM sales LEFT JOIN product ON product.productid=sales.productid WHERE salesid='".$row['salesid']."'";
                                        $result = $con->query($sql);
                                        if ($result->num_rows>0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
											<tr>
												<td><?php echo ucwords($row['product_name']); ?></td>
												<td align="right"><?php echo number_format($row['product_price'], 2); ?></td>
												<!-- <td><?php echo $row['sales_qty']; ?></td> -->
												<td align="right">
													<?php
                                                        // $subtotal=$row['product_price']*$row['sales_qty'];
                                                // echo number_format($subtotal, 2);
                                                // $total+=$subtotal; ?>
												</td>
											</tr>
											<?php
                                            }
                                        }
									?>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
  
                     <?php
                    }
                }
            ?>
                </tbody>
                		
<?php
    include '../employee/footer.php';
?>