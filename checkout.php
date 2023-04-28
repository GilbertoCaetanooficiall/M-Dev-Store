<?php 
$active = 'my_account';

include('includes/header.php') ?>


   <div id="content">
        <div class="container">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="index.php">HOME</a>
                    </li>
                    <li>
                     Login
                    </li>
                </ul>

            </div>
                <div class="col-md-3">
                    <?php
                         include ("includes/sidebar.php");
                     ?>
                </div>
                <div class="col-md-9">
           <?php
            if (!isset($_SESSION['customer_email'])) {
                include ("customer/login.php");
               }else {
                    include("payments_options.php");
                }
               ?>
           </div>      
        </div>
   </div>
          
        <?php include ("includes/footer.php");?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
</body>
</html>