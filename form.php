
<!DOCTYPE html>
<html>
<head>
<title>PHP insertion</title>
<link href="css/demo.css" rel="stylesheet">
<style>

@import "http://fonts.googleapis.com/css?family=Droid+Serif";
/* The Above Line Is To Import Google Font Style */
.maindiv {
margin:30px auto;
width:980px;
height:500px;
background:#fff;
padding-top:20px;
font-family:'Droid Serif',serif;
font-size:14px
}
.title {
width:500px;
height:70px;
text-shadow:2px 2px 2px #cfcfcf;
font-size:16px;
text-align:center
}
.form_div {
width:70%;
float:left
}
form {
width:300px;
border:1px dashed #aaa;
padding:10px 30px 40px;
margin-left:70px;
background-color:#f0f8ff
}
form h2 {
text-align:center;
text-shadow:2px 2px 2px #cfcfcf
}
textarea {
width:100%;
height:60px;
border-radius:1px;
box-shadow:0 0 1px 2px #123456;
margin-top:10px;
padding:7px;
border:none
}
.input {
width:100%;
height:30px;
border-radius:2px;
box-shadow:0 0 1px 2px #123456;
margin-top:10px;
padding:7px;
border:none;
margin-bottom:20px
}
.submit {
color:#fff;
border-radius:3px;
background:#1F8DD6;
padding:5px;
margin-top:40px;
border:none;
width:100%;
height:30px;
box-shadow:0 0 1px 2px #123456;
font-size:18px
}
p {
color:red;
text-align:center
}
span {
text-align:center;
color:green
}
</style>
</head>
<body>
<div class="maindiv">
<!--HTML Form -->
<div class="form_div">
<div class="title">
<h2>login to the administrator.</h2>
</div>
<form action="form.php" method="post">
<!-- Method can be set as POST for hiding values in URL-->
<h2>login</h2>
<label>username:</label>
<input class="input" name="username" type="text" value="">
<label>Email:</label>
<input class="input" name="email" type="text" value="">
<label>password:</label>
<input class="input" name="password" type="password" value="">
<input class="submit" name="submit" type="submit" value="login">
</form>
</div>
</div>
</body>
<?php
$servename="localhost";
$username="root";
$password="";
$db="bbit3";
$connection = mysql_connect("localhost", "root", "","bbit3"); // Establishing Connection with Server
$db = mysql_select_db("bbit3", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['password'];
if($username !=''||$email !=''){
//Insert Query of SQL
$query = mysql_query("insert into administrator(username, email, password) values ('$username', '$email', '$password')");
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection)
 ?>
