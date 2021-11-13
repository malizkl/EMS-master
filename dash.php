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
<title>Dash</title>
<style>

body {
    background-image: url("https://www.xmple.com/wallpaper/blue-gradient-white-highlight-linear-1920x1080-c2-ffffff-add8e6-l-50-a-120-f-21.svg");
}

th {
background-color:#d4d3cf;
}
.margina {

  margin-top:10px;

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
<ul class="list-group " >
  <li class="list-group-item"><a href="add_new_empl.php"> Add New Employees </a></li>
  <li class="list-group-item"><a href="dash.php"> View all Employees </a></li>
  </ul>
  
  </div>
  </div>
  <div class="col-lg-9 col-md-9 mt-5">
<h3>Employees List </h3>
<table class="table table-bordered table-light table-hover table-striped ">
<tr>
<th>ID</th>
<th>Name</th>
<th>Deails</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php 

$sql = "SELECT * FROM employees1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    while($employees = mysqli_fetch_assoc($result)) { ?>

      <tr>
      <td> <?php echo $employees['e_id']; ?> </td>   
         <td> <?php echo $employees['e_name']; ?> </td>
         <td> <a href ="single_employee.php?e_id=<?php echo $employees['e_id']; ?>" class="btn btn-block btn-info">Details</a></td>
         <td> <a href ="edit.php?e_id=<?php echo $employees['e_id']; ?>" class="btn btn-block btn-success">Edit</a></td>
         <td> <a href ="delete.php?e_id=<?php echo $employees['e_id']; ?>" class="btn btn-block btn-danger">Delete</a></td>
      </tr>  
    <?php }
}else {
  echo "0 results";
}

?>
    
</table>

  </div>
  </div>
  </div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>