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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">   
    <!-- bootstrap cdn link for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font-awesome cdn link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin-img{
    width: 100px;
    object-fit: contain;

}
/* .footer{
    position:absolute;
    bottom: 0;
} */
body{
    overflow-x:hidden;
}
.view-img{
    width:100px;
    object-fit:contain;
}
.user-img{
    width:100px;
    object-fit:contain;
}

    </style>
    </head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
 <img src="../images/—Pngtree—shopping logo design ready to_5052125.png" width="50px" height="50px"alt="">
 <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
 
    <?php
    if(!isset($_SESSION['admin_name'])){
        echo" <li class='nav-item'>
        <a href='' class='nav-link'>Welcome Guest</a>
    </li>";
    }else{
        echo" <li class='nav-item'>
        <a href='' class='nav-link'>Welcome ".$_SESSION['admin_name']."</a>
    </li>";
    }
    ?>
           <?php
        if(isset($_SESSION['admin_name'])){
echo"<li class='nav-item'>
<a class='nav-link' href='admin_logout.php'>logout</a>
</li>";
        }
        else{
            echo"<li class='nav-item'>
<a class='nav-link' href='admin_registration.php'>Register</a>
</li>";
        }
        ?>
       
    </ul>
</nav>
    </div>
</nav>
<!-- second child -->
<div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>
</div>
<!-- third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
<div class="p-4">
    
<?php
if(isset($_SESSION['admin_name'])){
        $admin_name= $_SESSION['admin_name'];
        $select_admin_data="select * from `admin_register` where admin_name='$admin_name'";
        $result =mysqli_query($con, $select_admin_data);
        $row_data= mysqli_fetch_assoc($result);
        $admin_name=$row_data['admin_name'];
        $admin_image=$row_data['admin_image'];
        echo "<a href=''><img src='./admin_image/$admin_image' alt='' class='admin-img'></a>";
        echo"  
        <p class='text-light text-center'>$admin_name</p>";
}
        
        ?>
 
</div>
<div class="button text-center">
    <button class="btn btn-info text-light m-1"><a href="insert_product.php" class="nav-link my-1">Insert Products</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?view_products" class="nav-link my-1">View Products</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?insert_categories" class="nav-link my-1">Insert Categories</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?view_categories" class="nav-link my-1">View Categories</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?insert_Brand" class="nav-link my-1">Insert Brands</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?view_brands" class="nav-link my-1">View Brands</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?list_orders" class="nav-link my-1">All Orders</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?list_payments" class="nav-link my-1">All Payments</a></button>
    <button class="btn btn-info text-light m-1"><a href="index.php?list_users" class="nav-link my-1">List Users</a></button><br><br>
    <?php
    if(!isset($_SESSION['admin_name'])){
        echo"<button class='btn btn-info text-light m-1'><a href='admin_login.php' class='nav-link my-1'>Login</a></button";
        
    }else{
        echo"<button class='btn btn-info text-light m-1'><a href='admin_logout.php' class='nav-link my-1'>Logout</a></button";
    }
    ?>
    >
    
</div>
    </div>
</div>
<div class="container my-5">
<?php
if(isset($_GET['insert_categories'])){
    include('insert_categories.php');
}
if(isset($_GET['insert_Brand'])){
    include('insert_brands.php');
}
if(isset($_GET['view_products'])){
    include('view_products.php');
}
if(isset($_GET['edit_products'])){
    include('edit_products.php');
}
if(isset($_GET['delete_products'])){
    include('delete_product.php');
}
if(isset($_GET['view_categories'])){
    include('view_categories.php');
}
if(isset($_GET['view_brands'])){
    include('view_brands.php');
}
if(isset($_GET['edit_categories'])){
    include('edit_categories.php');
}
if(isset($_GET['edit_brands'])){
    include('edit_brands.php');
}
if(isset($_GET['delete_categories'])){
    include('delete_category.php');
}
if(isset($_GET['delete_brands'])){
    include('delete_brand.php');
}
if(isset($_GET['list_orders'])){
    include('list_orders.php');
}
if(isset($_GET['list_payments'])){
    include('list_payments.php');
}
if(isset($_GET['list_users'])){
    include('list_users.php');
}




?>
</div>

   <!-- last child -->
   <div class="bg-info p-3 text-center footer">
<p>All right reserved @- Designed by shubhi awasthi</p>
</div>
</div>

  
      <!-- bootstrap cdn link for js -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>