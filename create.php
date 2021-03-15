<?php
if($_POST){

    // include database connection
    include 'config/shoppingcart.php';
    require'read.php';

    try{

        // insert query
        $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";

        // prepare query for execution
        $stmt = $con->prepare($query);

        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));

        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }

    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}

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
