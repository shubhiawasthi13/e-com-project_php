<?php
if(isset($_GET['edit_brands'])){
    $edit_brand_id=$_GET['edit_brands'];
    $get_brand="select * from `brands` where brand_id=$edit_brand_id";
    $result_brand=mysqli_query($con, $get_brand);
    $row=mysqli_fetch_assoc($result_brand);
    $brand_title=$row['brand_title'];

}
 //update category//
 if(isset($_POST['update_brand'])){
    $brand_title=$_POST['brand_title'];

     $update_query="Update `brands` set brand_title='$brand_title'where brand_id=$edit_brand_id";
     $result_update=mysqli_query($con, $update_query);
     if(isset($result_update)){
        echo "<script>alert('brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
     }
 }
?>
<div class="container mt-3">
<h1 class="text-center">Edit Brands</h1>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="brand_title" class="form-label">Brand Title</label>
        <input type="text" name="brand_title" id="brand_title" class="form-control" required="requried" value="<?php echo $brand_title?>">
    </div>
    <input type="submit" name="update_brand" class="bg-info border-0 p-2" value="Update Brand">
</form>
</div>