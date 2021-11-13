<?php require 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EMS</title>

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
<div class="container">
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<div class="card border-col rounded dimensions shadow-lg p-3 mb-5 bg-white" style="margin-top: 150px">
<div class="card-heading text-center mb-4"><h3 class="mt-3"> REGISTER</h3> </div>
<div class="card-body">
<form class="bg-ligh" action=" " method ="POST">
<div class="form-group">
<input type="email" class="form-control input-sm" name="u_email" required placeholder="Your email" >
</div>
<div class="form-group">
<input type="text" class="form-control input-sm" name="u_name" required placeholder="Your name" >
</div>
<div class="form-group">
<input type="password" class="form-control input-sm" name="u_pass" required placeholder="Your password" >
</div>
<div class="form-group">
<input type="submit" class="btn btn-success btn-sm" name="u_reg" value="Register">
<a href="index.php" class="btn btn-info btn-sm"> Login </a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<?php 

if(isset($_POST['u_reg'])){
    $u_email=$_POST['u_email'];
    $u_name=$_POST['u_name'];
    $u_pass=md5($_POST['u_pass']);

    $sql = "INSERT INTO users (u_email,u_name,u_pass) VALUES ('$u_email', '$u_name','$u_pass') ";

    if(mysqli_query ($conn, $sql)) {
        echo "<script> alert('New record created successfully') </script>";


    }
    else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }

}

?>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>