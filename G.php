<?php

if(isset($_POST['search']))
{
    $con = mysqli_connect("localhost", "root", "", "company");

    $value = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query=("SELECT * FROM `orders` WHERE CONCAT(`id`, `total_price`, `total_items`, `date`)LIKE'%".$value."%");
    $search_result=filterTable($query);

}
 else {
   $query=("SELECT   * FROM orders
       INNER JOIN order_items on orders.id=order_items.id
       INNER JOIN food on order_items.product_id = food.id");
       $search_result = filterTable($query);

}

// function to connect and execute the query
function filterTable($query)
{
    $con = mysqli_connect("localhost", "root", "", "company");
    $filter_Result = mysqli_query($con, $query
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <form action="G.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>

            <table>
              <tr>
                <th>product_id</th>
                 <th>product_name</th>
                <th>total_price</th>
                <th>quantity</th>
                <th>date</th>
              </tr>
              <?php while ($row=mysqli_fetch_array($search_result)): ?>
              <tr>
              <td><?php echo $row["id"];?></td>
              <td><?php echo $row["pname"];?></td>
              <td><?php echo $row["total_price"];?></td>
              <td><?php echo $row["total_items"];?></td>
              <td><?php echo $row["date"];?></td>
            <?php endwhile;?>
            </tr>

            </table>
        </form>

    </body>
</html>
