<?php
if(isset($_SESSION['admin_name'])){
  ?>
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
   <tr class="text-center">
    <th>Sl no</th>
    <th>Category Title</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
</thead>
<tbody class="bg-secondary">
    <?php
    $select_cat="select * from `categories`";
    $result_cat=mysqli_query($con,$select_cat);
    $number=0;
    while($row=mysqli_fetch_assoc($result_cat)){
    $category_id=$row['category_id'];
    $category_title=$row['category_title'];
    $number++;
    

    ?>
    <tr class="text-light text-center">
        <td><?php echo $number?></td>
        <td><?php echo $category_title?></td>
        <td><a href='index.php?edit_categories=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href='index.php?delete_categories=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
<?php
}
else{
  echo  "<script>alert('please login')</script>";
  echo "<script>window.open('admin_login.php','_self')</script>";
}
?>