<?php
if(isset($_SESSION['admin_name'])){
  ?>
<h3 class ="text-success text-center">All Payments</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
    <?php
$get_payment="Select * from `users_payment`";
      $result_payment=mysqli_query($con, $get_payment);
      $row_count=mysqli_num_rows($result_payment);
      echo"<tr class='text-center'>
      <th>Sl no</th>
      <th>Invoice Number</th>
      <th>Amount</th>
      <th>Payment Mode</th>
      <th>Payment Date</th>
      <th>Delete</th>
     </tr>";
     ?>
    </thead>
    <tbody class="bg-secondary">
        <?php
        if($row_count==0){
            echo "<h2 class='text-center text-danger mt-5'>No Payments Yet</h2>";
         }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_payment)){
            $payment_id=$row_data['payment_id'];
            $order_id=$row_data['order_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $payment_mode=$row_data['payment_mode'];
            $payment_date=$row_data['date'];
            $number++;
            echo"<tr class='text-center text-light'>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$payment_date</td>
            <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
         }
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