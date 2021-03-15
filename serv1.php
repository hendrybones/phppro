<?php
$servername="localhost";
$username="root";
$password="";
$db="bbit3";
$con=mysqli_connect("localhost","root","","bbit3");
if(isset($_POST['register'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password_1=$_POST['password'];
  $password_2=$_POST['password_2'];
  $con=mysqli_connect('localhost','root','');
  //ensure form is filed properly
  if(empty($username)){
    array_push($errors,"username is required");
  }
  if(empty($email)){
    array_push($errors,"email is required");
  }
  if(empty($password_1)){
    array_push($errors,"password is required");
  }
  if(empty($username)){
    array_push($errors,"The two password do not match ");
  }
  // if no erros add information to database
  if(count($errors)==0){
    $password=md5($password_1);
    $sql = "INSERT INTO administrator(username,email,password) VALUES('$username','$email','$password')";
    mysqli_query($con,$sql);
    $_SSESION['username']=$username;
    $_SSESION['success']="you are now logged in";
    header('location:invent.php');

  }
}

 ?>
