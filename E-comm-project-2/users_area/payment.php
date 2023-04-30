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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">    
    <!-- bootstrap cdn link for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .payment_img{
            margin:auto;
            display:block;
        }
    </style>
</head>
<body>
    <!-- php code for access user_id -->
    <?php
    $user_ip =getIPAddress();
    $get_user = "select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];
    ?>

   <div class="container">
    <h2 class="text-center text-info">Payment options</h2>
    <div class="row d-flex align-items-center justify-content-center my-5">
        <div class="col-md-6">
            <a href="https//www.paypal.com"><img src="../images/upi.jpg" class="payment_img" alt=""></a>
        </div>
        <div class="col-md-6 text-center">
            <a href="order.php?user_id= <?php  echo $user_id; ?>"><h4>Payoffline</h4></a>
        </div>

    </div>
   </div>
    
</body>
</html>