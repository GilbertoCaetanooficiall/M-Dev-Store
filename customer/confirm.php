
<?php
session_start();
$active="my_account";
include("../functions/function.php");

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
}else {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
<div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm"><?php
               
               if (!isset($_SESSION['customer_email'])) {
                echo "Bem-vindo :";
               }else {
                    echo "Bem-vindo:". $_SESSION['customer_email']."";
                }
               ?></a>
               <a href="checkout.php"><?php items();?> Items In Your Cart</a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li  class="<?php if ($active=='my_account') {echo "active";}?>">
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php"><?php
               
               if (!isset($_SESSION['customer_email'])) {
                echo "<a href='../checkout.php'>Login</a>";
               }else {
                    echo "<a href='../logout.php'>Sair</a>";
                }
               ?></a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
    </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="../images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="../images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li >
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                       <a href="customer/my_account.php">My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items();?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->


   <div id="content">
     <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="index.php">HOME</a>
                </li>
                <li>
                     Pagamento
                 </li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
             include ("includes/sidebar.php");
             $update_id=$_GET['order_id'];
             $get_customer_orders="SELECT * FROM customer_order WHERE order_id='$update_id'";
              $run_customer_orders=mysqli_query($con,$get_customer_orders);
                                
              while ($count_c_o=mysqli_fetch_array($run_customer_orders)) {
             $due_amoun=$count_c_o['due_amount'];
             $customer_id=$count_c_o['customer_id'];
             $id_produto=$count_c_o['id_produto'];
             $invoice_n=$count_c_o['invoice_no'];
            }
             ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <h1 align="center">Por favor confirme seu pagamento</h1>
             <form  method="post" >
                    
                <div class="form-group">
                        <label>Invoice No:</label>
                        <input type="text" class="form-control" value="<?php echo $invoice_n;?>"  name="invoice_no" disabled>
                    </div>
                    
                    <div class="form-goup">
                        <label>Montante</label>
                        <input type="text" class="form-control" value="<?php echo $due_amoun;?>" name="due_amount" disabled>
                    </div>
                    
                    <br>
                    
                    <div class="form-goup">
                        <label>Selecione o metodo de pagamento :</label>
                       <select name="payment_mode" required class="form-control">
                        <option disabled>Selecione o modo de pagamento:</option>
                        <option>Paypal</option>
                        <option>Pagseguro</option>
                        <option>Union Pay</option>
                        <option>Western Union</option>
                       </select>
                    </div>
                    
                    <br>
                
                    <div class="form-goup">
                        <label>Transação/ ID  de referência</label>
                        <input type="text" class="form-control" name="ref_no" required>
                    </div>
                    
                    <br>
                    
                    <div class="form-goup">
                        <label>Western Union</label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                    
                    <br>
                    
                    <div class="form-goup">
                    
                        <label>Data de pagamento</label>
                    
                        <input type="datetime-local" name="payments_date" class="form-control" required>
                        
                    
                    </div> 
                    
                    <br>
                    
                    <div class="text-center">

                        <button class="btn btn-primary btn-lg" name="submit">
                        
                        <i class="fa fa-money"></i> Confirmar Pagamento
                        
                        </button>
                    
                    </div>

             </form>
                <?php
                
                if (isset($_POST['submit'])) {
                    $update_id;
                    $invoice_no=$_POST['invoice_no'];
                    $due_amount=$_POST['due_amount'];
                    $payment_mode=$_POST['payment_mode'];
                    $ref_no=$_POST['ref_no'];
                    $code=$_POST['code'];
                    $payments_date=$_POST['payments_date'];

                    $insert_payments="INSERT INTO payments SET
                    invoice_no='$invoice_n',
                    due_amount=' $due_amoun',
                    payment_mode=' $payment_mode',
                    customer_id='$customer_id',
                    id_produto='$id_produto',
                    ref_no=' $ref_no',
                    code=' $code',
                    
                    payments_date=' $payments_date'";
                    
                    $run_payments=mysqli_query($con,$insert_payments);
                    
                    $completo="completo";
                    
                    $update_c_order="UPDATE customer_order SET order_status='$completo' WHERE order_id='$update_id'";
                    
                    $run_c_orders=mysqli_query($con,$update_c_order);
                    
                    $update_p_order="UPDATE pending_orders SET order_status='$completo' WHERE order_id='$update_id'";
                    
                    $run_p_orders=mysqli_query($con,$update_p_order);
                    if ($run_p_orders) {
                        echo "<script>alert('Obrigado por utilizar os nossos serviços, a sua compra encomenda estará pronta dentro de 24 horas')</script>";
                        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                    }
                }?>
            </div>
        </div> 
    </div>

   </div>


   <?php include ("includes/footer.php");?>
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>
<?php }
?>