
<?php
session_start();
 $username = $_SESSION['username'];
 $password = $_SESSION['password'];
         if($username && $password)
         {
                  header( 'Location: index.php' ) ;
         }
         else
         {
           function index()
           {
               echo   "<form action='' method='post'>"
                        ."Username:<input type='text' name='username' size='30'>"
                        ."Password: <input type='password'name='password' size='30'>"
                        ."<input type='submit' value='login' name='login'/>"
                     ."</form>";
           }
           function login()
           {
               $username = $_REQUEST['
               $password = $_REQUEST['password'];

               if ($username=="")
               {
                   die("<br /> You Forgot to type in your username!");
               }
               if ($password=="")
               {
                  die("<br />You Forgot to type in your password! ");
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

               $result = mysql_query("SELECT * FROM users WHERE username='$username' ");
               $row = mysql_fetch_array($result);

               $user = $row['username'];
               if($username != $user)
               {
                  die("<br />Username is wrong!<br /> ");
               }

               $real_password = $row['password'];
               if($password != $real_password)
               {
                     die("<br />Your password is wrong!<br /> ");
               }

               $_SESSION['username']=$username;
               $_SESSION['password']=$password;

               header( 'Location: index.php' ) ;
           }

           if (isset($_REQUEST['login']))
           { 
               login(); 
           }
           else
           {
               index();
           }
         }
 ?>