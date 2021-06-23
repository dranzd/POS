<?php

function component($product_name, $product_price, $product_qty, $photo,$productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$photo\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$product_name</h5>
                            <h5>
                                <span class=\"price\">₱$product_price</span>
                            </h5>
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($photo, $product_name, $product_price, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$photo alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-1\">$product_name</h5>
                                <small class=\"text-secondary\"></small>
                                <h5 class=\"pt-2\">₱$product_price</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"  id=\"minus\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" id=\"qtyBox\" name=\"itemqty[]\" class=\"form-control qtybox w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\" id=\"add\"><i class=\"fas fa-plus\"></i></button>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
?>
       
            