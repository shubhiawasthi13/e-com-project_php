<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_products_query="Delete from `products` where product_id=$delete_id";
    $result=mysqli_query($con,$delete_products_query);
    if($result){
        echo "<script>alert('product deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}
?>