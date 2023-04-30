<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Comm Project-2</title>
    <link rel="stylesheet" href="style.css">    
    <!-- bootstrap cdn link for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font-awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
  <!--  main container -->
  <div class="container-fluid p-0">
  <!-- first child -->
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="../images/—Pngtree—shopping logo design ready to_5052125.png" alt="" width="50px" height="50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <?php
         if(isset($_SESSION['username'])){
          echo" <li class='nav-item'>
          <a class='nav-link' href='profile.php'>My Account</a>
        </li>";
         }
         else{
          echo" <li class='nav-item'>
          <a class='nav-link' href='user_registration.php'>Register</a>
        </li>";
         }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> 
      </ul>
      <form action = "search_product.php" class="d-flex" role="search" method ="get">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit" name ="search_data_product" value ="Search" class ="btn btn-outline-light" >
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<div class="navbar navbar-expand-lg bg-secondary">
<ul class="navbar-nav me-auto">
        <?php
         if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }

        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>  ";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>
        </li>  ";
        }
        ?>
        
</ul>
</div>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">This is all in one - Keep Shopping</p>
</div>
<!-- fourth child -->
<div class="row">
  <div class="col-md-12">
  <div class="row">
<?php
if(!isset($_SESSION['username'])){
    include('user_login.php');
}else{
    include('payment.php');
}

?>

  <!--col-end-->
</div>
<!-- row-end -->
</div>
 
</div>

    <!-- last child -->
<div class="bg-info p-3 text-center">
<p>All right reserved @- Designed by shubhi awasthi</p>
</div>
 </div>

  <!-- bootstrap cdn link for js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>