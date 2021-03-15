

<?php

  require'connectoder.php';
$sql=$query="select food.id as id, food.pname, SUM(order_items.quantity) as total_items, sum(order_items.price) as total_price from food left join order_items on order_items.product_id = food.id  GROUP BY food.id=";
$result=mysqli_query($con,$sql);
    //var_dump($result);
  //  $result = selectdata($sql);

// $lastoid = 0;
// foreach($orders as $key){
//
//     while($lastid != $i['oid']) {
//         $lastoid = $i['oid'];
//         echo "Ordernr: ".$lastid."<br/>";
//         echo "Produktname: ".$i['product_name']."<br>";
//         echo "Menge: ".$i['quantity']."<br/>";
//         echo "Preis: ".$i['price']."<br/>";
//         echo "Status: ".$i['status']."<br/>";
//         echo "<br/><br/><hr/>";
//     }
// }
// }
?>
<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

	<!-- notification message -->
      	<?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
          	<h3>
              <?php
              	echo $_SESSION['success'];
              	unset($_SESSION['success']);
              ?>
          	</h3>
          </div>
      	<?php endif ?>

        <!-- logged in user information -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>order report</title>
  </head>
  <body>
    <?php  if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>

    <?php endif ?>
</div>

    <div style="overflow-x:auto;">
        <form  method="grace.php" action="POST">
          <div style="border: 1px solid #ddd; background-color:powderblue;padding:16px;table,tr,th,td">

          <table class="table, table-striped">
            <tr>
              <th>product_id</th>

              <th>product_name</th>
              <th>quantity</th>
              <th>total_price</th>
              <th>total_items</th>
              <th>date</th>
            </tr>
            <?php
            if(mysqli_num_rows($result)>0){
              while($row=fetch_assoc($result))
              {
                ?>
                <tr>
                  <td><?php echo $row["id"];?></td>
                  <td><?php echo $row["pname"];?></td>
                  <td><?php echo $row["quantity"];?></td>
                  <td><?php echo $row["total_price"];?></td>
                  <td><?php echo $row["total_items"];?></td>
                  <td><?php echo $row["date"];?></td>
                </tr>
                <?php
              }
            }
            ?>

             <!-- ?>
            <?php while ($row=mysqli_fetch_array($result)): ?>
            <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["product_name"];?></td>
            <td><?php echo $row["total_price"];?></td>
            <td><?php echo $row["total_items"];?></td>
            <td><?php echo $row["date"];?></td>
          <?php endwhile;?>
          </tr> -->
          </table>
        </form>
      </div>


  </body>
</html>
