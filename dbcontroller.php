<?php
class DBConntroller{
  private $host="localhost";
  private $user="root";
  private $password="";
  private $db="company";
  private $conn;

  function construct(){
    $this->$conn=$this->connectDB();
  }
  function connectDB(){
    $conn=mysqli_connect($this->$host,$this->$user,$this->$password,$this->$db);
    return $conn;
  }
  function runQuery($query){
    $results=mysqli_query($this->$conn,$query);
    while($row=mysqli_fetch_assoc($results)){
      $results[]=$row;
    }
    if(!empty($resultset))
    return $resultset;
  }
  function numrows($query){
    $result=mysqli_query($this->$conn,$query);
    $rowcount=mysqli_num_rows($result);
    return $rowcount;
  }
}
?>
