<?php

session_start();
require_once ("component.php");
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
   
</head>
<body class="bg-light">


<?php
    require_once ('header.php');
?>


    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                        if (isset($_SESSION['cart'])){
                            $productid = array_column($_SESSION['cart'], 'product_id');
                        
                            foreach($productid as $id){
                                $sql = "SELECT productid,product_name,product_price,product_qty,photo FROM product WHERE productid = '".$id ."' ";
                                $result = $con->query($sql);
                                if ($result){
                                        foreach ($result as $row) {
                                            if ($row['productid'] == $id) {
                                            cartElement($row['photo'], $row['product_name'], $row['product_price'], $row['productid']);
                                            $total = $total + (int)$row['product_price'];
                                        }
                                    }
                                
                                }else{
                                    echo "<h5>Cart is Empty</h5>";
                                }
                            } 
                        }
                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <form action="purchase.php" method="post">
                    <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if (isset($_SESSION['cart'])){
                                    $count  = count($_SESSION['cart']);
                                    echo "<h6>Price ($count foods)</h6>";
                                }else{
                                    echo "<h6>Price (0 foods)</h6>";
                                }
                            ?>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6" >
                            <h6 id="totalvalue">₱<?=number_format($total, 2) ?></h6>
                            <hr>
                            <h6 id="totalpayable">₱
                            <?= number_format($total, 2)?></h6>
                        </div>
                    </div>
                    <div class="container">
                        <div class="mt-2">
                            <input type="hidden" name="sales" value="<?= number_format($total, 2); ?>" id="salestotal" readonly /> 
                            <button type="submit" name="purchase">Purchase</button>  
            </div>
                </div>           
                    </div>  
                
            </div>           
        </div>   
    </div> 
</form>

<script>
    
</script>
<?php
    include 'footer.php';

?>