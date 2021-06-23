<?php
    include '../connection.php';
    if (!isset($_SESSION)) {
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js "></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>

<!-- 
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

   <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
      <script>
        $(document).ready(function() {
            $('#dataTable_inventory').DataTable();
        });
    </script>

    <script>  
		$(document).ready(function(){
			$(".sidebar_menu li").click(function(){
			  $(".sidebar_menu li").removeClass("active");
			  $(this).addClass("active");
			});

			$(".hamburger").click(function(){
			  $(".wrapper").addClass("active");
			});

			$(".close, .bg_shadow").click(function(){
			  $(".wrapper").removeClass("active");
			});
		});
	</script>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <div class="bg_shadow"></div>
      <div class="sidebar_inner">
        <div class="close">
          <i class="fas fa-times"></i>
        </div>
        
        <div class="profile_info">
            <div class="profile_img">
              <img src="../images/Dwcc.jpg" alt="profile_img">
            </div>
        </div>
      
        <ul class="sidebar_menu">
          <li ><a href="#">
              <div class="icon"><i class="fas fa-users"></i></div>
              <div class="title">Users</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
            <ul class="accordion">
                 <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "customer.php"){
                echo 'class="active"';
              }
            ?>><a href="customer.php" class="active">Customer</a></li>
              </ul>
          </li>  
          <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "showproduct.php"){
                echo 'class="active"';
              }
            ?>><a href="showproduct.php">
              <div class="icon"><i class="fas fa-receipt"></i></div>
              <div class="title">Products</div>
              </a>              
          </li> 
          <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "inventory.php"){
                echo 'class="active"';
              }
            ?>><a href="inventory.php">
              <div class="icon"><i class="fas fa-receipt"></i></div>
              <div class="title">Item Inventory</div>
              </a>              
          </li>  
          <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "orders.php"){
                echo 'class="active"';
              }
            ?>><a href="orders.php">
              <div class="icon"><i class="fas fa-receipt"></i></div>
              <div class="title">Punch Orders</div>
              </a>              
          </li>   
          <li ><a href=#>
              <div class="icon"><i class="fas fa-credit-card"></i></div>
              <div class="title">Reports</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
              <ul class="accordion">
                 <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "salesreports.php"){
                echo 'class="active"';
              }
            ?>><a href="../employee/salesreports.php">Sales Reports</a></li>
                 <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "inventoryreports.php"){
                echo 'class="active"';
              }
            ?>><a href="../employee/inventoryreports.php" class="active">Inventory Reports</a></li>
              </ul>
            
          </li>  
          <li><a href="../logout.php">
              <div class="icon"><i class="fas fa-sign-out-alt"></i></div>
              <div class="title">Logout</div>
              </a></li>  
        </ul>
      </div>
    </div>
    <div class="main_container">
      <div class="navbar">
         <div class="hamburger">
           <i class="fas fa-bars"></i>
         </div>
         <div class="logo">
           <a href="customer.php">POS System</a>
        </div>
      </div>
      <div class="content">
         <div id="page-wrapper">
            <div class="container-fluid">