<?php
    include '../employee/header.php';
?>
    <div style="height:50px;"></div>
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
    include '../employee/footer.php'
?>