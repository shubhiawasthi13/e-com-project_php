<?php
include('includes/connect.php');
include('functions/common_functions.php');
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
    <style>
        .cart_image{
            width: 80px;
            height: 80px;
            object-fit:contain;
        }
      
    </style>
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
    <img src="images/—Pngtree—shopping logo design ready to_5052125.png" alt="" width="50px" height="50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
         if(isset($_SESSION['username'])){
          echo" <li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
         }
         else{
          echo" <li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
         }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<?php
cart();
?>
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
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>  ";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
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
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <?php
                 $ip = getIPAddress();
                 $total_price=0;
                 $cart_query = "select * from `cart_details` where ip_address='$ip'";
                 $result = mysqli_query($con, $cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                  echo "<thead>
                  <tr>
                          <th>Product Title</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Remove</th>
                          <th colspan='2'>Operations</th>
                      </tr>";
                 while($row=mysqli_fetch_array($result)){
                   $product_id =$row['product_id'];
                   $Select_products = "select * from `products` where product_id='$product_id'";
                   $result_products = mysqli_query($con, $Select_products);
                   while($row_product_price=mysqli_fetch_array($result_products)){
                     $product_price =array($row_product_price['product_price']);
                     $price_table=$row_product_price['product_price'];
                     $product_title=$row_product_price['product_title'];
                     $product_image1=$row_product_price['product_image1'];
                     $product_values =array_sum($product_price);
                     $total_price+=$product_values;
               
                   
                 
                ?>
                
                <tbody>
                    <tr>
                        <td><?php echo $product_title?></td>
                        <td><img class ="cart_image" src="./admin_area/product_images/<?php echo $product_image1?>" alt=""></td>
                        <td><input type="text" name ="qty" class="form-input w-50"></td>
                        <?php
   $ip = getIPAddress();
   global $con;
   if(isset($_POST['update_cart'])){
     $quantities =$_POST['qty'];
     $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$ip'";
     $result_products_quantity=mysqli_query($con, $update_cart); 
     $total_price=$total_price * $quantities;
     }
   
                        ?>
                        <td><?php echo $price_table?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value ="<?php echo $product_id ?>"></td>
                        <td class="d-flex">
                            <input type="submit" value ="Update Cart" name ="update_cart" class ="bg-info px-3 py-2 border-0 mx-3">
                            <input type="submit" value ="Remove Cart" name ="remove_cart" class ="bg-info px-3 py-2 border-0 mx-3">
                        </td>
                    </tr>
                    <?php
                   }
                 }
                }
                else{
                  echo "<h4 class='text-center text-danger'>Cart is empty</h4>";
                }
                    ?>
                    
                </tbody>
            </thead>
        </table>
             
        <!-- subtotal -->
        <div class ="d-flex mb-5">
        <?php
                 $ip = getIPAddress();
                 $cart_query = "select * from `cart_details` where ip_address='$ip'";
                 $result = mysqli_query($con, $cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
           echo" <h4 class ='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
           <a href='index.php' class= 'bg-info px-3 py-2 border-0 mx-3 text-dark text-decoration-none'>Continue shopping</a>
           <a href='./users_area/checkout.php' class= 'bg-secondary text-light p-3 py-2 border-0 text-decoration-none'>checkout</a>";
                 }
                 else{
                  echo " <a href='index.php' class= 'bg-info px-3 py-2 border-0 mx-3 text-dark nav-link'>Continue shopping</a>";
                 }
            ?>
        </div>
    </div>
</div>
</form>
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query ="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con, $delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>



    <!-- last child -->
<div class="bg-info p-3 text-center">
<p>All right reserved @- Designed by shubhi awasthi</p>
</div>
 </div>

  <!-- bootstrap cdn link for js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>