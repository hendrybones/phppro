<?Php
require "connectoder.php";// Database connection

if($stmt = $con->query("SELECT id, date ,total_price, total_items FROM orders")){

  echo "No of records : ".$stmt->num_rows."<br>";
  ?>

  while ($row = $stmt->fetch_assoc()) {
	echo $row['id'],$row['total_items'],$row['total_price'].$row['date']."<br>";
  }
}else{
echo $con->error;
}
?>
