<?php
session_start();
require'connectoder.php';
require'cart.php';

// save order details for new
//$cart= unserialize(serialise($_SESSION['update']));
$product_id=$_POST['id'];
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$item_quantity=$_POST['quantity'];
$con=mysqli_connect('localhost','root','');
      if(isset($_GET["update"])){
      $sql="INSERT INTO orders( id,product_name,product_price,quantity)
      values('$product_id,$product_name,$product_price,$item_quantity'))";

    }

?>
