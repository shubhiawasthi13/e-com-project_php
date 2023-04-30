<?php
if(isset($_SESSION['admin_name'])){
  ?>
<h3 class ="text-success text-center">All Users</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
$get_users="Select * from `user_table`";
      $result_user=mysqli_query($con, $get_users);
      $row_count=mysqli_num_rows($result_user);
      echo"   <tr class='text-center'>
      <th>Sl no</th>
      <th>Username</th>
      <th>User Email</th>
      <th>user image</th>
      <th>User Address</th>
      <th>User Mobile</th>
      <th>Delete</th>   
      </tr>";   
    ?>
  
<tbody class="bg-secondary">
<?php
        if($row_count==0){
            echo "<h2 class='text-center text-danger mt-5'>No Users Yet</h2>";
         }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_user)){
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                echo"    <tr class='text-center text-light'>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image ?>'class='user-img'</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        
            </tr>";


            }
         
         }
         
         ?>
            

    
</tbody>
</table>
</table>
<?php
}
else{
  echo  "<script>alert('please login')</script>";
  echo "<script>window.open('admin_login.php','_self')</script>";
}
?>