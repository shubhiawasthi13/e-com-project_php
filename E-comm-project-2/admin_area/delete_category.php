<?php
if(isset($_GET['delete_categories'])){
    $delete_id=$_GET['delete_categories'];
    $delete_cat_query="Delete from `categories` where category_id=$delete_id";
    $result=mysqli_query($con,$delete_cat_query);
    if($result){
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }

}
?>