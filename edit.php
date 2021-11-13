<?php
require 'conn.php';
session_start();

if(!$_SESSION['u_name']){
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit employee</title>
<style>
body {
    background-image: url("https://www.xmple.com/wallpaper/blue-gradient-white-highlight-linear-1920x1080-c2-ffffff-add8e6-l-50-a-120-f-21.svg");
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php require 'nav.php' ?>

<div class="container" >
<div class="row" >
<div class="col-lg-3 col-md-3">
<div class="card  margina shadow-lg mb-5 bg-white mt-5">
<div class="card-header"> Manage employees </div>
  <li class="list-group-item"><a href="add_new_empl.php"> Add New Employees </a></li>
  <li class="list-group-item"><a href="dash.php"> View all Employees </a></li>
  </ul>
  
  </div>
  </div>
  <div class="col-lg-9 col-md-9 mt-5">
<h3>Edit employee </h3>
<form action="" method="POST">

<?php

$id = $_GET['e_id'];

$sql = "SELECT * FROM employees1 WHERE e_id='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    while($employees = mysqli_fetch_assoc($result)) { ?>

<div class="form-group">
<input type="text" class="form-control input-sm" name="e_name" value="<?php echo $employees['e_name']; ?>" placeholder="Employee name" require>
</div>
<div class="form-group">
<input type="email" class="form-control input-sm" name="e_email" value="<?php echo $employees['e_email']; ?>" placeholder="Employee email" require>
</div>
<div class="form-group">
<input type="tel" class="form-control input-sm" name="e_phone" value="<?php echo $employees['e_phone']; ?>" placeholder="Employee phone number" require>
</div>
<div class="form-group">
<input type="submit" class="btn btn-success" value="Edit Employee" name="e_edit">
</div>
<?php }
}else {
  echo "0 results";
}

?>

</form>

  </div>
  </div>
  </div>
<?php 
if(isset($_POST ['e_edit'])) {
    $e_name = $_POST['e_name'];
    $e_email = $_POST['e_email'];
    $e_phone = $_POST['e_phone'];

    $sql = "UPDATE employees1 SET e_name='$e_name', e_email='$e_email', e_phone='$e_phone' WHERE e_id='$id'";
 
    if(mysqli_query($conn, $sql)) {
      header('Location: dash.php');
    }
    else {
        echo "Error updating record:" . $sql . "<br>" ;
    }
}

?>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>