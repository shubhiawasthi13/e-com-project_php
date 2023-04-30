<?php
if(isset($_SESSION['admin_name'])){
  ?>
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
   <tr class="text-center">
    <th>Sl no</th>
    <th>Brand Title</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
</thead>
<tbody class="bg-secondary">
    <?php
    $select_brands="select * from `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    $number=0;
    while($row=mysqli_fetch_assoc($result_brands)){
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    $number++;
    

    ?>
    <tr class="text-light text-center">
        <td><?php echo $number?></td>
        <td><?php echo $brand_title?></td>
        <td><a href="index.php?edit_brands=<?php echo $brand_id?>" class="text-light"><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href="index.php?delete_brands=<?php echo $brand_id?>" class="text-light"><i class='fa-solid fa-trash'></i></a></td>
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