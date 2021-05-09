<?php
    include '../employee/header.php';
?>
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
								<a href="#detail<?php echo $row['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
								<?php include ('full_details.php'); ?>
							</td>
                     </tr>
                     <?php
                    }
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>		
<?php
    include '../employee/footer.php';
?>