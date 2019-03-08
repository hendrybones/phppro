<?php
$servername="localhost";
$username="root";
$password="";
$db="company";
$con=mysqli_connect("localhost","root","","company");

if(isset($_POST["add_to_shop"])){
  if(isset($_SESSION["cart"])){
    $item_array_id= array_column($_SESSION["cart"],"item_id");
    if(!in_arry($_GET["id"],$item_arry_id)){
      $count=count($_SESSION["cart"]);
      $item_arry=array(
        'product_id' => $_GET["id"],
        'product_name'  =>$_POST["hidden_name"],
        'product_price'=>$_POST["hidden_price"],
        'item_quantity'=>$_POST["quantity"]
      );
      $_SESSION["cart"][$count]=$item_arry;
      echo'<script>window.location="cart.php"</script>';
    }else
      {
          echo '<script>alert("food is already added")</script>';
          echo'<script>window.location="cart.php"</script>';
        }

    }
    else{
      $item_arry=array(
        'product_id' =>$_GET["id"],
        'product_name'  =>$_POST["hidden_name"],
        'product_price'=>$_POST["hidden_price"],
        'item_quantity'=>$_POST["quantity"]

      );
      $_SESSION["cart"][0]=$item_arry;
    }
  }
  if(isset($_GET["action"]))
  {
    if($_GET["action"]=="delete"){
      foreach($_SESSION["cart"] as $key => $value){
        if($value["product_id"]==$_GET["id"]){
          unset($_SESSION["cart"][$keys]);
          echo'<script>alert("product has been removed...")</script>';
          echo'<script>window.location="cart.php"<script>';
        }
      }
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
    <style>
    @import "http://fonts.googleapis.com/css?family=Droid+Serif";
    *{
      font-family: 'Titilium web',sans-serif;
    }
    .food{
      border: 1px solid #eaeaec;
      margin: -1px 19px 3px -1px;
      padding: 10px;
      text-align: center;
      background-color: #efefef;
    }
    table th, tr{
      text-align: center;
    }
    .title2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2px;
    }
    h2{
      text-align: center;
      color: #66afe9;
      background-color: #efefef;
      padding: 2px;

    }
    table th{
      background-color: #efefef;
    }


    </style>

  </head>
  <body>
    <div class="container" style="width: 700px">
      <h2 align="center">  odering food</h2>

      <?php
      $query="SELECT*FROM food ORDER BY id ASC";
      $result=mysqli_query($con,$query);
      if(mysqli_num_rows($result)>0)
      {
        while($row=mysqli_fetch_array($result))
        {
      ?>

          <div class="col-md-4">
            <div class="food">
            <form method="POST" action="cart.php"action=add$id<?php echo$row["id"]?>>
              <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px;padding:16px">
              <img src="<?php $row["image"];?>"class="img-responsive"/><br />
              <h4  class="text-info"><?php echo $row["pname"];?></h4 >
              <h4  class="text-danger"><?php echo $row["price"];?></h4 >
              <input type="text" name="quantity" class="form-control" value="1">
              <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];?>">
              <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
              <input type="submit" name="add_to_shop" style="margin-top:5px;" class="btn btn-succes" value="add to shop"/>
           </form>
           </div>
           </div>

        <?php

          }
        }
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
      if(!empty($_SESSION["cart"]))
      {
        $total=0;
        foreach($_SESSION["cart"] as $keys=>$values)
        {

      ?>
      <tr>
      <td><?php echo $values["product_name"];?></td>
      <td><?php echo $values["item_quantity"];?></td>
      <td><?php echo $values["product_price"];?></td>
      <td><?php echo number_format($values["item_quantity"]*$values["product_price"],2);?></td>
      <td><a href="cart.php? action=delete&id=<?php echo $values["product_id"];?>"<span class="text-danger">remove</span>"</a>"</td>
      </tr>
      <?php
      $total=$total+($values["$item_quanty"]*$values["product_price"]);
    }
    ?>
    <tr>
    <td colspan="3" align="right">Total</td>
    <td align="right">sh<?php echo number_format($total,2); ?></td>
    <td></td>
    </tr>
    <?php
  }
      ?>

     </table>
   </div>
    </body>
</html>
