<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap cdn link for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sh
</head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-item-center justify-content-center">
<div class="col-lg-12 col-xl-6">
    <form action="" method="post" enctype="multipart/form-data">
        <!-- username -->
<div class="form-outline mb-4">
     <label for="admin_name" class="form-label">Username</label>
     <input type="text" id="admin_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_name"/>
</div>
     <!-- useremail -->
<div class="form-outline mb-4">
     <label for="admin_email" class="form-label">Email</label>
     <input type="email" id="admin_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="admin_email"/>
</div>
    <!-- userimage -->
    <div class="form-outline mb-4">
     <label for="admin_image" class="form-label">Image</label>
     <input type="file" id="admin_image" class="form-control" required="required" name="admin_image"/>
</div>
    <!-- userpassword -->
    <div class="form-outline mb-4">
     <label for="admin_password" class="form-label">Password</label>
     <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password"/>
</div>
 <!-- confirm password -->
 <div class="form-outline mb-4">
     <label for="confirm_admin_password" class="form-label"> Confirm Password</label>
     <input type="password" id="confirm_admin_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="confirm_admin_password"/>
</div>
<div class="mt-4 pt-2">
    <input type="submit" value ="Register" class="bg-info py-2 px-3 border-0" name="admin_register">
    <p class =" small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php" class="text-danger"> Login</a></p>
</div>
    </form>
</div>
        </div>

    </div>
    
</body>
</html>

<?php

if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_admin_password'];

    $admin_image=$_FILES['admin_image']['name'];
    $admin_image_tmp=$_FILES['admin_image']['tmp_name'];

    //select query//
    $select_query="select * from `admin_register` where admin_name='$admin_name'";
$result=mysqli_query($con, $select_query);
$row_counts=mysqli_num_rows($result);
if($row_counts>0){
    echo "<script>alert('already register user')</script>"; 
}elseif($admin_password!=$confirm_admin_password){
    echo "<script>alert('passwords do not match')</script>";  
}
else{

//upload admin image//
    move_uploaded_file($admin_image_tmp,"./admin_image/$admin_image");
    //insert //
    $insert_query ="insert into `admin_register` (admin_name,admin_email,admin_image,admin_password) values ('$admin_name','$admin_email','$admin_image','$hash_password')";
    $sql_execute =mysqli_query($con, $insert_query);
    if($sql_execute){
        echo "<script>alert('data inserted successfully')</script>";  
        echo "<script>window.open('admin_login.php','_self')</script>"; 
     }else{
        die(mysqli_error($con));
     }
}
}

?>