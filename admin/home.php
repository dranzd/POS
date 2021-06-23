<?php
    ob_start();
    include '../admin/header.php';
    if (!isset($_SESSION)) {
        session_start();
    }
   
    if(isset($_SESSION['UserLogin'])){
        header("Location: ../admin/adduser.php");
      }
      else
      {
          header("Location: ../login.php");
      }
    //   echo $_SESSION['id'];
?>
<?php if(isset($_SESSION['UserLogin']) && $_SESSION['Access'] == 'Employee'){
        header("Location: ../employee/customer.php");
         } ?>
         <?php if(isset($_SESSION['UserLogin']) && $_SESSION['Access'] == 'Customer'){
        header("Location: ../user/index.php");
         } ?>
    
<?php
    include '../admin/footer.php';
?>
