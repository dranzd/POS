<?php
    include '../connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
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
              <img src="" alt="profile_img">
            </div>
        </div>
      
        <ul class="sidebar_menu">
            <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "home.php"){
                echo 'class="active"';
              }
            ?>><a href="../admin/home.php">
              <div class="icon"><i class="fas fa-desktop"></i></div>
              <div class="title">Dashboard</div>
              </a> 
          </li>  
          <li><a href="#">
              <div class="icon"><i class="fas fa-users"></i></div>
              <div class="title">Users</div>
              <div class="arrow"><i class="fas fa-chevron-down"></i></div>
              </a>
            <ul class="accordion">
                 <li><a href="#" class="active">Customer</a></li>
                 <li <?php 
              $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

              if($curPageName == "adduser.php"){
                echo 'class="active"';
              }
            ?>><a href="../admin/adduser.php" class="active">Add Admin</a></li>
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
           <a href="../admin/home.php">POS System</a>
        </div>
      </div>
      <div class="content">
         <div id="page-wrapper">
            <div class="container-fluid">
