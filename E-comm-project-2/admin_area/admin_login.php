<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="style.css">    
    <!-- bootstrap cdn link for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-item-center justify-content-center">
<div class="col-lg-12 col-xl-6">
    <form action="" method="post" enctype="multipart/form-data">
       
     <!-- username -->
<div class="form-outline mb-4">
     <label for="admin_name" class="form-label">Username</label>
     <input type="text" id="admin_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_name"/>
</div>
   
    <!-- userpassword -->
    <div class="form-outline mb-4">
     <label for="admin_password" class="form-label">Password</label>
     <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password"/>
</div>
 
<div class="mt-4 pt-2">
    <input type="submit" value ="Login" class="bg-info py-2 px-3 border-0" name="admin_login">
    <p class =" small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_registration.php" class="text-danger"> Register</a></p>
</div>
    </form>
</div>
        </div>
  
    </div>
    
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    $select_query= "select * from `admin_register` where admin_name='$admin_name'";
$result=mysqli_query($con, $select_query);
$row_count= mysqli_num_rows($result);
$row_data = mysqli_fetch_assoc($result);

    $_SESSION['admin_name']=$admin_name;
    if(password_verify($admin_password, $row_data['admin_password'])){
        if($row_count==1){
            $_SESSION['admin_name']=$admin_name;
            echo "<script>alert('login successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";  
        }
        }else{
        echo "<script>alert('invaild password or user not exist')</script>"; 
    }
}

?>
