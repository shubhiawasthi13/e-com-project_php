<?php
include('../includes/connect.php');
session_start();
if(isset($_SESSION['admin_name'])){
if(isset($_POST['insert_products'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status ="true";
  
// access images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name']; 
//access temp_image
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
// checking empty condition
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all fields')</script>";
        exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            
            $insert_products = "insert into `products` (product_title, product_description,
            product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price,date,status) values ('$product_title', '$product_description',  '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price',NOW(),'$product_status')";
            $result_products = mysqli_query($con, $insert_products);
            if($result_products){
                echo "<script>alert('product inserted successfully')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products- Admin Dashbord</title>
     <!-- bootstrap cdn link for css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font-awesome cdn link --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center">Insert Products</h3>
        <!-- form -->
        <form action="" method ="post" enctype ="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name ="product_title" id ="product_title" placeholder="Enter product title" autocomplete="off" class="form-control" required ="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name ="product_description" id ="product_description" placeholder="Enter product description" autocomplete="off" class="form-control" required ="required">
            </div>
              <!-- keywords -->
              <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" name ="product_keywords" id ="product_keywords" placeholder="Enter product keywords" autocomplete="off" class="form-control" required ="required">
            </div>
              <!-- categories -->
              <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
            <option value="">Select a category</option>
            <?php
            $select_query = "select * from `categories`";
            $result_query = mysqli_query($con, $select_query);
            while($row = mysqli_fetch_assoc($result_query)){
              $category_title = $row['category_title'];
              $category_id = $row['category_id'];
              echo " <option value='$category_id'>$category_title</option>";
            }

            ?>

            </select>
            </div>
             <!-- Brands -->
             <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brand"  id="" class="form-select">
            <option value="">Select a Brand</option>
            <?php
            $select_query = "select * from `brands`";
            $result_query = mysqli_query($con, $select_query);
            while($row = mysqli_fetch_assoc($result_query)){
              $brand_title = $row['brand_title'];
              $brand_id = $row['brand_id'];
              echo " <option value='$brand_id'>$brand_title</option>";
            }

            ?>
            </select>
            </div>
              <!-- Image 1 -->
              <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <input type="file" name ="product_image1" id ="product_image1"class="form-control" required ="required">
            </div>
             <!-- Image 2 -->
             <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <input type="file" name ="product_image2" id ="product_image2"class="form-control" required ="required">
            </div>
             <!-- Image 3 -->
             <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <input type="file" name ="product_image3" id ="product_image3"class="form-control" required ="required">
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name ="product_price" id ="product_price" placeholder="Enter product price" autocomplete="off" class="form-control" required ="required">
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="insert_products" class="btn btn-info" value ="Insert products">
            </div>
        </form>
    </div>
    

 <!-- bootstrap cdn link for js -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
else{
  echo  "<script>alert('please login')</script>";
  echo "<script>window.open('admin_login.php','_self')</script>";
}
?>