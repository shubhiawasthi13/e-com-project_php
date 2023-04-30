<?php
if(isset($_GET['delete_brands'])){
    $delete_id=$_GET['delete_brands'];
    $delete_brand_query="Delete from `brands` where brand_id=$delete_id";
    $result=mysqli_query($con,$delete_brand_query);
    if($result){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}
?>