<?php
    include '../connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <style>
        body {
    background: #e7f1ff;
    font-size: 14px;
    letter-spacing: 1px;
}
.main_container {
    margin-left: 10px;
    width: calc(95% - 10px);
    transition: all 0.3s ease;
}
.wrapper {
    display: flex;
    width: 100%;
}
.navbar .hamburger:hover {
    opacity: 0.7;
}
        .navbar {
    background: #fff;
    height: 50px;
    width: 103%;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125);
    display: flex;
    align-items: center;
    padding: 0 20px;
}

.navbar .hamburger {
    font-size: 25px;
    cursor: pointer;
    margin-right: 20px;
    color: #5558c9;
    display: none;
}

.navbar .logo a {
    font-family: 'Trade Winds';
    color: #5558c9;
    font-size: 20px;
}

.content {
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
}
    </style>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
</head>
<body>
<div class="main_container">
      <div class="navbar">
         <div class="hamburger">
         </div>
         <div class="logo">
           <a href="../user/index.php">POS System</a>
        </div>
      </div>
      <div class="content">
         <div id="page-wrapper">
            <div class="container-fluid">