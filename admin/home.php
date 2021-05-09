<?php
    include '../admin/header.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['UserLogin'])){
    
      }
      else
      {
          header("Location: login.php");
      }
?>
<?php if(isset($_SESSION['UserLogin']) && $_SESSION['Access'] == 'Employee'){
        header("Location: ../employee/home.php");
         } ?>
         <?php if(isset($_SESSION['UserLogin']) && $_SESSION['Access'] == 'Customer'){
        header("Location: ../user/index.php");
         } ?>
    
<?php
    include '../admin/footer.php';
?>
