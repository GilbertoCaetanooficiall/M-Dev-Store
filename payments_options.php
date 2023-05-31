<div class="box">

<?php
  
  $customer_email=$_SESSION['customer_email'];
    $select_customer="SELECT * FROM customer WHERE customer_email='$customer_email'";
    $run_customer=mysqli_query($con,$select_customer);
    $row=mysqli_fetch_array($run_customer);
    $customer_id=$row['customer_id'];
?>
    <h1 class="text-center">Opções de pagamentos para ti</h1>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id;?>" class="">Pagamento offline</a>
    </p>
    <center>
        <p class="lead">
            <a href="">
                Pague com o Paypal
                <img src="customer/customer_images/paypal.webp" alt="" class="img-responsive">
            </a>
        </p>
    </center>
</div>