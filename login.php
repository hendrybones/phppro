<?php
include('server.php')
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="REG.css">
  <link rel="stylesheet"href="cart.css">

</head>
<body>
  <header>
    <div class="col-md-4">
        <div class="container">
          <div id="branding">
            <h1><i class="hen.jpg"></i><span class="highlight">ORDER</span> REPORT</h1>
          </div>
          <nav>
            <ul>
              <li class="current"><a href="cart.php">home</a></li>
              <li><a href="login.php">administrator<a/></li>
                <li><a href="service.html">help<a/></li>
            </ul>
          </nav>
        </div>
     </header>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  
  	</p>
  </form>
</body>
</html>
