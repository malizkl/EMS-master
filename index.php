<?php require 'conn.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap application</title>

    <style>

    body {
        background-image: url("https://www.xmple.com/wallpaper/blue-gradient-white-highlight-linear-1920x1080-c2-ffffff-add8e6-l-50-a-120-f-21.svg");
    }

    .bg-color {
        background-color:#e0ebeb;
    }
    .border-col {
        border-color:#669999;
    }

    .dimensions {
        height:300px;
        width:300px;
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
<div class="col-lg-4 d-flex justify-content-center ">
<div class="card align-content-center border-col rounded dimensions shadow-lg p-3 mb-5 bg-white " style="margin-top: 150px">
<div class="card-body  text-center rounded mt-2 "> <h3>Login </h3> </div>

<form class="bg-transparent " action=" " method ="POST">
<div class="form-group">
<input type="text" class=" form-control input-sm" name="u_name" required placeholder="Your username" >
</div>
<div class="form-group mb-4 ">
<input type="password" class="form-control input-sm" name="u_pass" required placeholder="Your password" >
</div>
<div class="form-group ">
<input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login">
<a href="register.php" class="btn btn-info btn-sm"> Register </a>
</div>
</form>

</div>
</div>
</div>
</div>

<?php 
if (isset($_POST['u_login'])) {
    $u_name=$_POST['u_name'];
    $u_pass=md5($_POST['u_pass']);

    $sql = "SELECT * FROM users WHERE u_name='$u_name'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($user = mysqli_fetch_assoc($result)) {
            if($u_name == $user['u_name'] && $u_pass == $user['u_pass']){
                $_SESSION['u_name'] = $u_name;;
                header('Location: dash.php');
            }
            else {
                echo '<script> alert("Wrong username or password") </script>';
        
        }
    }
}
        else {
            echo "0 result";
        }
    }



?>







<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>