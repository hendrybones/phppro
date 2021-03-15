<?php 
 session_start();

 echo    "<h2 style='padding-left: 10px'>Register A User :</h2>"
        ."<form action='' method='post'>" 
        ."Username :<input type='text' name='user' size='30'>"
        ."Password :<input type='text' name='pass' size='30'>"
        ."<input type='submit' value='Register' name='Register'/>";

 if (isset($_REQUEST['Register']))
 {
 $username = $_REQUEST['user'];
 $pass = $_REQUEST['pass'];

 if ($username=="")
 {
     die("<br /> You Forgot to type in the Username for the user !<br /> ");
 }
 if ($pass=="")
 {
     die("<br /> You Forgot to type in the Password for the user !<br /> ");
 }

 $connect = mysql_connect("host_name", "user", "password");
 if(!$connect)
 {
     die(mysql_error());
 }

 $select_db = mysql_select_db("database_name");
 if(!$select_db)
 {
     die(mysql_error());
 }

