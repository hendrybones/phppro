<?php
if(isset($_POST['search']))
{
    $value= $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    // $query = "SELECT * FROM `orders` LEFT JOIN order_items on orders.id=order_items.id
    // -- OUTTER JOIN food on order_items.product_id = food.id) WHERE orders.id=".$value."";


}
 else {
    $query =( "SELECT * FROM `orders`
    INNER JOIN order_items on orders.id=order_items.id
    INNER JOIN food on order_items.product_id = food.id");
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "company");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}

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

<!DOCTYPE html>
<html>
    <head>

        <title>SEARCH RECORDS</title>

        <link rel="stylesheet" href="css\bootstrap.min.css">

        <style>
        body{
          background-color: white;
        }

            table,tr,th,td
            {
                border: 1px solid black;
            }

        </style>
    </head>
    <body>
      <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
      <?php endif ?>

        <!-- <form action="F.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br> -->
<div class="row">
  <div class="col-md-6">

            <table>
              <tr>
                <th>product_id</th>
                 <th>product_name</th>
                <th>total_price</th>
                <th>quantity</th>
                <th>date</th>
              </tr>
              <?php while ($row=mysqli_fetch_array($search_result)): ?>
              <tr>
              <td><?php echo $row["id"];?></td>
              <td><?php echo $row["pname"];?></td>
              <td><?php echo $row["total_price"];?></td>
              <td><?php echo $row["total_items"];?></td>
              <td><?php echo $row["date"];?></td>
            <?php endwhile;?>
            </tr>

            </table>
          </div>
          <div class="col-md-6">
            <table>
              <tr>

                 <th>product_name</th>
                <th>quantity</th>
                <th>total_price</th>

              </tr>
              <?php

              //SELECT pname, SUM(quantity) AS "q" FROM food GROUP BY pname ;
              // $query="select f.pname, sum(i.quantity) as totalQty, sum(i.price) as totalPrice from order_items as food left join food as f on food.id=i.product_id GROUP by i.product_id";
               // $query="select food.id as id, food.pname, SUM(order_items.quantity) as total_items, sum(order_items.price) as total_price from food left join order_items on order_items.product_id = food.id  GROUP BY food.pname=pname";
              // $query = "select pname, SUM(quantity) AS total_q from food group by pname ";
              $query="select food.pname, sum(order_items.quantity) as totalQty, sum(order_items.price) as totalPrice from order_items  left join food  on food.id=order_items.product_id GROUP by order_items.product_id";
              $search_result = filterTable($query);
              while ($row=mysqli_fetch_array($search_result)): ?>
              <tr>

              <td><?php echo $row["pname"];?></td>
              <td><?php echo $row["totalQty"];?></td>
              <td><?php echo $row["totalPrice"];?></td>
            <?php endwhile;?>
            </tr>

            </table>
          </div>
          </div>

            <script src="js/jquery-1.3.2.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </body>
</html>
