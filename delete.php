<?php
require 'conn.php';
$id= $_GET['e_id'];
$sql = "DELETE FROM employees1 WHERE e_id='$id'";
if(mysqli_query($conn, $sql)) {
    header('Location: dash.php');
  }
  else {
      echo "Error deleting record:" . $sql . "<br>" ;
  }