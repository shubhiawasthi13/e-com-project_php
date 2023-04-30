<?php
if(isset($_GET['edit_categories'])){
    $edit_category_id=$_GET['edit_categories'];
    $get_cat="select * from `categories` where category_id=$edit_category_id";
    $result_cat=mysqli_query($con, $get_cat);
    $row=mysqli_fetch_assoc($result_cat);
    $category_title=$row['category_title'];

}
 //update category//
 if(isset($_POST['update_category'])){
    $cat_title=$_POST['category_title'];

     $update_query="Update `categories` set category_title='$cat_title'where category_id=$edit_category_id";
     $result_update=mysqli_query($con, $update_query);
     if(isset($result_update)){
        echo "<script>alert('category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
     }
 }
?>
<div class="container mt-3">
<h1 class="text-center">Edit Category</h1>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="category_title" class="form-label">Category Titl</label>
        <input type="text" name="category_title" id="category_title" class="form-control" required="requried" value="<?php echo $category_title?>">
    </div>
    <input type="submit" name="update_category" class="bg-info border-0 p-2" value="Update Category">
</form>
</div>