<div class="container">
   <br />
   <h3 align="center">PHP Ajax Shopping Cart by using Bootstrap Popover</h3>
   <br />
   <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Menu</span>
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
      <a class="navbar-brand" href="/">Webslesson</a>
     </div>

     <div id="navbar-cart" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
       <li>
        <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
         <span class="glyphicon glyphicon-shopping-cart"></span>
         <span class="badge"></span>
         <span class="total_price">$ 0.00</span>
        </a>
       </li>
      </ul>
     </div>

    </div>
   </nav>
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="#" class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
   </div>

   <div id="display_item">


   </div>

  </div>
  <!-- index.php !-->

load_product();

function load_product()
{
              $.ajax({
   url:"fetch_item.php",
   method:"POST",
   success:function(data)
   {
    $('#display_item').html(data);
   }
  });
}

<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '
  <div class="col-md-3" style="margin-top:12px;">
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
             <img src="images/'.$row["image"].'" class="img-responsive" /><br />
             <h4 class="text-info">'.$row["name"].'</h4>
             <h4 class="text-danger">$ '.$row["price"] .'</h4>
             <input type="text" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />
             <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
             <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
             <input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
  ';
 }
 echo $output;
}
