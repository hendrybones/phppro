<?php
$con=mysqli_connect("localhost","root","","geek");


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> food odering</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/"></link>
    <script src="https://maxcdn.bootstrapcdn/bootstrap/3.3.6/js/bootstrap.min.css"></script>

  </head>
  <body>
  <br />
  <div class="container" style="width:700px;">
  <h3> align="center"> order meals</h3><br />
  <?php
  $query="SELECT *FROM products ORDER BY id ASC";
  $result=mysqli_query($con,$query);
  if(mysqli_num_row($result)>0){
    while($row=mysqli_fetch_array($result)){
      ?>
  <div class="col-md-4">
  <form method="POST" action="shop.php? action=add&id=<php echo $row["id"]; ?>">
  <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px;padding:20px">
  <img src="<?php $row["image"];?>"class="food_images"/><br />
  <h4  class="text-info"><?php echo $row["name"];?></h4 >
  <h4  class="text-danger"><?php echo $row["price"];?></h4 >
  <input type="text" name="quantity" class="form-control" value="1">
  <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
  <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
  <input type="submit" name="add_to_shop" style="margin-top:5px;" class="btn btn-succes" value="add to shop"/>
  </form>
}
}

</div>

<?php
?>
<div style="clear:both"></div>
<br />
<h3> order  details<h3>
<div class="table-responsive">
<table class="tabel-bordered">
<tr>
<td width="40%">product name</th>
<td width="40%">quantity</th>
<td width="40%">price</th>
<td width="40%">Total</th>
<td width="40%">Action</th>
</tr>
<?php
if(!empty($_SESSION["shop"]))
{
  $total=0;
  foreach($_SESSION["shop"] as $keys=>$values)

?>
<tr>
<td><?php echo $values["product_name"];?></td>
<td><?php echo $values["product_quantity"];?></td>
<td><?php echo $values["product_price"];?></td>
<td><?php echo number_format($values["product_quantity"]*$values["product_price"],2);?></td>
<td><a href="shop.php? action=delete&id=<?php echo $values["product_id"];?>"<span class="text-danger">remove</span>"</a>"</td>
</tr>
<?php
$total=$total+($values["$product_quanty"]*$values["product_price"]);
?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right">$<?php echo number_format($total,2); ?></td>
<td></td>
</tr>
</table>
</div>
</div>
</div>
<br />
</body>
</html>
