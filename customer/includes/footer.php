<?php include('db.php') ?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                    <h4>Pages</h4>
            <ul>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
                <li><a href="../shop.php">Shop</a></li>
                <li><a href="my_account.php">Account</a></li>
            </ul>
               <hr>
               <h4>User Section</h4>
                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="../customer_register.php">Register</a></li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>

            <div class="com-sm-6 col-md-3">
                <h4>Top Produtcs Categories</h4>
                <ul>
               <?php
               
               $gets_products_cats="SELECT * FROM products_categories";
                  $res=mysqli_query($con,$gets_products_cats);
                    while ($row=mysqli_fetch_array($res)) {
                       $products_cats_id=$row['p_cat_id'];
                       $products_cats_title=$row['p_cat_title'];
                                
                       echo " 
                            
                     <li><a href='../shop.php?p_cat=$products_cats_id'> $products_cats_title</a></li>
                        
                                                 ";
                                     } 
                                 ?>
                </ul>
                    <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-sm-6 col-md-3">
                <h4>Find Us</h4>
                <p>
                    <strong>GC Media inc.</strong>
                    <br/>Angola
                    <br/>Luanda
                    <br/>+244942232403
                    <br/>marcelocaetano655@gmail.com
                    <br/><strong>Mr. Gibelé</strong>
                </p>
                <a href="../contact.php">Check Our pages</a>
                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col col-sm-6 col-md-3">
                <h4>Get the News</h4>
                <p>
                    Não perca nossos ultimos lançamentos
                </p>

                <form action="" method="post">
                    <div class="input-group">
                    
                    <input type="text" class="form-control" name="email">
                    
                        <spam class="input-group-btn">
                    
                            <input type="submit" value="subscribe" class="btn btn-default">
                    
                        </spam>
                    </div>
                </form>
                
                <hr>
                
                <h4>Keep in Touch</h4>

                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
            </div>

        </div>
    </div>
</div>

<div id="copyright">
    <div class="container">
        <div class="col-md-6">

            <p class="pull-left">&copy; 2023 Gibele Shop All rights reserverd </p>

        </div>
        <div class="col-md-6">

            <p class="pull-right">&copy; Bilded by: <a href="#">Gilberto Caetano</a> </p>

        </div>
    </div>
</div>
 

    