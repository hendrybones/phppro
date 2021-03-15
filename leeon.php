<?php
$username="localhost";
$servername="root";
$password="";
$db="leon";
$con=mysqli_connect("localhost","root","","leon");
$username=$_POST["username"];
$password=$_POST["password"];
if(isset($_POST["login"])){
  $sql="INSERT INTO customer(username,password)values('$username','$password')";
  mysqli_query($con,$sql);
}


?>
