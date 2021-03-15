<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>read records</title
    <link rel="stylesheet"href="create.php"
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
    <body>

       <!-- container -->
       <div class="container">

           <div class="page-header">
               <h1>Read Products</h1>
           </div>

           <!-- PHP code to read records will be here -->
           <?php
           // include database connection
           include 'shoppingcart.php';

           // delete message prompt will be here

           // select all data
           $query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
           $stmt = $con->prepare($query);
           $stmt->execute();

           // this is how to get number of rows returned
           $num = $stmt->rowCount();

           // link to create record form
           echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

           //check if more than 0 record found
           if($num>0){

               // data from database will be here

           }

           // if no records found
           else{
               echo "<div class='alert alert-danger'>No records found.</div>";
           }
           ?>


       </div> <!-- end .container -->
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <table class='table table-hover table-responsive table-bordered'>
           <tr>
               <td>Name</td>
               <td><input type='text' name='name' class='form-control' /></td>
           </tr>
           <tr>
               <td>Description</td>
               <td><textarea name='description' class='form-control'></textarea></td>
           </tr>
           <tr>
               <td>Price</td>
               <td><input type='text' name='price' class='form-control' /></td>
           </tr>
           <tr>
               <td></td>
               <td>
                   <input type='submit' value='Save' class='btn btn-primary' />
                   <a href='shoppingcart.php' class='btn btn-danger'>Back to read products</a>
               </td>
           </tr>
       </table>
   </form>

   </body>
   </html>
