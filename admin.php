<?php
require('serv1.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin.css">
    <title>admin</title>
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
    title {
    width:500px;
    height:70px;
    text-shadow:2px 2px 2px #cfcfcf;
    font-size:16px;
    text-align:center
    }
    form {
    width:300px;
    border:1px dashed #aaa;
    padding:10px 30px 40px;
    margin-left:70px;
    background-color:#f0f8ff
    }
    /*{
      margin: 0px;
      padding: 0px;
    }
    body{
      font-size: 120%;
      background: gray;
    }
    .header{
      width: 30px;
      margin: 50px auto 0px;
      color: white;
      background: #5F9EA0;
      text-align: center;
      border: 1px solid #B0C4DE;
      border-bottom: none;
      border-radius: 10px 10px 0px 0px;
      padding: 20px;
    }
    form{
      width: 30%;
      margin: 0px auto;
      padding: 20px;
      border: 1px solid black;
      background: white;
      border-radius: 0px 0px 10px 10px;
    }
*/
    </style>
  </head>
  <body>

    <div class="header">
      <h2>register</h2>
    </di>
    <form method="POST" action="admin.php">

      <div class="input-group">
        <label>username</label>
        <input type="text" name="username">
      </div>
      <div class="input-group">
        <label>email</label>
        <input type="text" name="email">
      </div>
      <div class="input-group">
        <label>password</label>
        <input type="password" name="password_1">
      </div>
      <div class="input-group">
        <label>confirm password</label>
        <input type="password" name="password_2">
      </div>
      <button type="submit" name="register" class="btn">register</button>
      <p>
        Already a member?<a href="login.php">sign in</a>
      </p>



      <div class="input-group">

      </di>
    </form>

  </body>
</html>
