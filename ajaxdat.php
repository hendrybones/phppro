<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

function loaddata()
{
 var name=document.getElementById( "id" );

 if(pname)
 {
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   product_name:pname,
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
 }

 else
 {
  $( '#display_info' ).html("Please Enter Some Words");
 }
}

</script>

</head>
<body>

<input type="text" name="pname" id="username" onkeyup="loaddata();">
<div id="display_info" >
</div>

</body>
</html>
<?php

if( isset( $_POST['product_name'] ) )
{

$pn = $_POST['product_name'];

$host = 'localhost';
$user = 'root';
$pass = ' ';

mysql_connect($host, $user, $pass);

mysql_select_db('company');

$selectdata = " SELECT total_items,total_price FROM oders WHERE product_id LIKE '$id%' ";

$query = mysql_query($selectdata);

while($row = mysql_fetch_array($query))
{
 echo "<p>".$row['total_price']."</p>";
 echo "<p>".$row['total_items']."</p>";
}

}
?>
