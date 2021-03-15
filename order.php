

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

    <title></title>
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
                <li ><a href="cart.php">home</a></li>
                <li class="current"><a href="order.php">administrator<a/></li>
                  <li><a href="service.html">help<a/></li>
              </ul>
            </nav>
          </div>
       </header>

       <?php
       require'connectoder.php';
       if (isset($_GET['id'])) {
       $id = $_GET['id'];
       $query="SELECT*FROM orderdetails ORDER BY id ASC";
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

                     <h4  class="text-info"><?php echo $row["product_grid"];?></h4 >
                     <h4  class="text-danger"><?php echo $row["product_name"];?></h4 >
                       <h4  class="text-info"><?php echo $row["product_price"];?></h4 >
                         <h4  class="text-info"><?php echo $row["quantity"];?></h4 >
                           <h4  class="text-info"><?php echo $row["date"];?></h4 >
  
                  </form>
                  </div>
                  </div>


       <div class="form">
       <h2>---Details---</h2>
       <!-- Displaying Data Read From Database -->
       <span>product id:</span> <?php echo $row['product_id']; ?>
       <span>product_name:</span> <?php echo $row['product_name']; ?>
       <span>product quantity:</span> <?php echo $row['quantity']; ?>
       <span>price:</span> <?php echo $ro['price']; ?>
       <span>date:</span> <?php echo $row1['datetime']; ?>
       </div>
       <?php
       }

       }
       }

       ?>

  </body>
</html>
