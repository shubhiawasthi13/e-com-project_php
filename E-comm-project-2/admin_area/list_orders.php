<?php
if(isset($_SESSION['admin_name'])){
  ?>
<h3 class ="text-success text-center">All Orders</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
<?php
      $get_orders="Select * from `users_order`";
      $result_orders=mysqli_query($con, $get_orders);
      $row_count=mysqli_num_rows($result_orders);
      echo"  <tr class='text-center'>
      <th>Sl no</th>
      <th>Due Amount</th>
      <th>Invoice Number</th>
      <th>Total Products</th>
      <th>Order date</th>
      <th>Status</th>
      <th>Delete</th>
     </tr>";
     
 ?>
</thead>
<tbody class="bg-secondary">

        <?php
     if($row_count==0){
        echo "<h2 class='text-center text-danger mt-5'>No Orders Yet</h2>";
     }
     else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result_orders)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo " <tr class='text-center text-light'>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
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