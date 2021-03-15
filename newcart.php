<?php
require'connectoder.php';
session_start();
//require_once("dbcontroller.php");
//$db_handle=new DBConntroller();
if(!empty($_GET["action"])){
	switch($_GET["action"]){
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode="SELECT * FROM food WHERE code='" . $_GET["id"] . "'";
				$itemArray = array(
					'Name' => $_GET["pname"],
         'id'  =>$_POST["id"],
         'quantity'=>$_POST["quantity"],
         'price'=>$_POST["price"],
       );

				if(!empty($_SESSION["newcart"])) {
					if(in_array($productByCode[0]["id"],array_keys($_SESSION["newcart"]))) {
						foreach($_SESSION["newcart"] as $key => $values) {
								if($productByCode[0]["id"] == $key) {
									if(empty($_SESSION["newcart"][$key]["quantity"])) {
										$_SESSION["newcart"][$key]["quantity"] = 0;
									}
									$_SESSION["newcart"][$key]["quantity"] += $_POST["quantity"];
								}
						}
					} else {
						$_SESSION["newcart"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} else {
					$_SESSION["newcart"] = $itemArray;
				}
			}
			break;
			case "remove":
	if(!empty($_SESSION["newcart"])) {
		foreach($_SESSION["newcart"] as $k => $v) {
			if($_GET["id"] == $k)
				unset($_SESSION["newcart"][$k]);
			if(empty($_SESSION["newcart"]))
				unset($_SESSION["newcart"]);
		}
	}
	break;
case "empty":
	unset($_SESSION["newcart"]);
        break;
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compactible"content="ie=edge">
    <title></title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn/bootstrap/3.3.6/js/bootstrap.min.css"></script>
    <link rel="stylesheet"href="cart.css">

  </head>
  <body>
    <header>
      <div class="col-md-4">
          <div class="container">
            <div id="branding">
              <h1><i class="hen.jpg"></i><span class="highlight">ORDER</span> MANAGMENT SYSTEM</h1>
            </div>
            <nav>
              <ul>
                <li class="current"><a href="cart.php">home</a></li>
                <li><a href="order.php">administrator<a/></li>
                  <li><a href="service.html">help<a/></li>
              </ul>
            </nav>
          </div>
       </header>
    <div class="container" style="width: 700px">
      <h2 align="center">  odering food</h2>



  <div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;

?>
<div class="table-responsive">
<table class="tabel-bordered">
<table class="newcart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">id</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
    foreach ($_SESSION["newcart"] as $values){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["pname"]; ?></td>
				<td><?php echo $item["id"]; ?></td>
				<td style="text-align:right;"><?php echo $values["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$values["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>
<div id="product_grid">
<?php

$query="SELECT*FROM food ORDER BY id ASC";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		?>
<div class="product-item">
<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
<div class="product-tile-footer">
<div class="product-title"><?php echo $row["pname"]; ?></div>
<div class="product-price"><?php echo $row["price"]; ?></div>
<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
</div>
</form>
</div>
<?php
}
}

?>
</div>
</html>
