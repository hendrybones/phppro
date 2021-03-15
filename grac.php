<?php
require'connectoder.php';

if(isset($_POST["search"]))
{
  $valueTosearch=$_POST['valueTosearch'];
  $query="SELECT * FROM `orders` WHERE CONCAT(`id`, `total_price`, `total_items`, `date`)LIKE'%".$valueTosearch."%";
   $search_result=filterTable($query);
}else {
    $query="SELECT * FROM `orders`";
    $search_result=filterTable($query);
  }

    function filterTable($query){
    $con=mysqli_connect("localhost","root","","company");
    $filter_results=mysqli_query($con,$query);
     return $filter_results;
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>fetch the records</title
      <link rel="stylesheet"href="grace.css">
      <script src="js/jquery-1.3.2.js"></script>
      <script src="js/bootstrap.min.js"></script>


    <style>
    table,tr,th,td{
      border-bottom: 1px solid black;
      padding: 20px;
    }
    </style>
  </head>
  <body>
    <div class="content">
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
        <?php  if (isset($_SESSION['username'])) : ?>
        	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        	<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>

        <?php endif ?>
    </div>

<header>

</header>
<div style="overflow-x:auto;">
    <form  method="grace.php" action="POST">
      <div style="border: 1px solid #ddd; background-color:powderblue;padding:16px;table,tr,th,td">
      <input type="text" name="order records" placeholder="records of orders"><br><br>
      <input type="submit" name="search" value="filter"<br><br>
      <table>
        <tr>
          <th>product_id</th>

          <th>product_price</th>
          <th>quantity</th>
          <th>date</th>
        </tr>
        <?php while ($row=mysqli_fetch_array($search_result)): ?>
        <tr>
        <td><?php echo $row["id"];?></td>

        <td><?php echo $row["total_price"];?></td>
        <td><?php echo $row["total_items"];?></td>
        <td><?php echo $row["date"];?></td>
      <?php endwhile;?>
      </tr>
      </table>
    </form>
  </div>
  </body>
</html>
