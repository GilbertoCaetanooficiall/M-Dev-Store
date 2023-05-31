<?php
$active='Shopping Cart';
include('includes/header.php') ?>


   <div id="content">
     <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="index.php">HOME</a>
                </li>
                <li>
                     Cart
                 </li>
            </ul>
        </div>
        <div id="cart" class="col-md-9">
            <div class="box">
                <form action="cart.php" method="POST" enctype="multipart/form-data">
                    <h1>Carrinho de compras</h1>

                    <?php 
                    $ip_add= getRealIpUser();
                    $sql="SELECT * FROM cart WHERE ip_add= '$ip_add'";
                    $res=mysqli_query($con,$sql);
                    $count=mysqli_num_rows($res);
                    ?>
                    <p class="text-muted">Tens actualmente <?php echo $count; ?> item(s) no carrinho</p>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Producto</th>
                                <th>Quantidade</th>
                                <th>Preço unitário</th>
                                <th>Tamanho</th>
                                <th colspan="1">Apagar</th>
                                <th colspan="2">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total= 0;
                            while ($row=mysqli_fetch_array($res)) {
                               $product_qty=$row['qty'];
                               $p_id=$row['id_produto'];
                               $ip_add=$row['ip_add'];
                               $produtc_size=$row['size'];

                               $sql2="SELECT * FROM products WHERE id_produto='$p_id'";
                               $res2=mysqli_query($con,$sql2);
                               while ($row=mysqli_fetch_array($res2)) {
                                $product_title=$row['product_title'];
                                $product_pice=$row['product_price'];
                                $sub_total=$row['product_price']*$product_qty;
                                $product_image=$row['product_image'];
                                $total += $sub_total;
                               
                             ?>
                            <tr>
                                <td>
                                    <img  src="admin_worker_area/product_images/product_images_1/<?php echo $product_image;?>" alt="product 3-a" class="img-responsive">
                                </td>
                                <td>
                                    <a href="details.php?id_produto=<?php echo $p_id;?>" style="text-decoration: none;"><?php echo $product_title ;?> </a>
                                </td>
                                <td>
                                <?php echo $product_qty;?>
                                </td>
                                <td>
                                <?php echo $product_pice;?> KZ
                                </td>
                                <td>
                                <?php echo $produtc_size ;?>
                                </td>
                                <td>
                                    
                                    <input type="checkbox" name="remove[]" value=<?php echo $p_id;?>>
                                </td>
                                <td>
                                    <?php echo $sub_total; ?> KZ
                                </td>
                            </tr>
                            <?php 
                            }
                            }
                            ?>
                        </tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2"><?php echo $total;?> KZ</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"> Continue comprando</i>
                            </a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="update" value="update-cart" class="btn btn-default">
                            <i class="fa fa-refresh"> Actualizar o carrinho</i>
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                            Finalizar compras <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <?php function UpdateCart(){
                global $con;
                if (isset($_POST['update'])) {
                    foreach ($_POST['remove'] as $remove_id ) {
                        $delect_product ="DELETE FROM cart WHERE p_id='$remove_id'";
                        $res=mysqli_query($con,$delect_product);
                        if ($delect_product) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }

            echo $up_cart =UpdateCart();
            ?>
            <div id="row same-heigth-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same heigth headline">
                        <h3 class="text-center">Produtos que talvez possas gostar</h3>
                    </div>
                </div>
                <?php 
                 
                    
                    $sql="SELECT * FROM products ORDER BY RAND() LIMIT 1,3 ";
                    $res=mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_array($res)) {
                        $product_id=$rows['id_produto'];
                        $product_price=$rows['product_price'];
                        $product_image=$rows['product_image'];
                        $product_title=$rows['product_title'];
                 
                ?>
                    <div class="col-md-3 col-sm-6 center-resposive">
                    <div class="product same-heigth">
                        
                        <a href="details.php?id_produto=<?php echo $product_id;?>">
                            <img src="admin_worker_area/product_images/product_images_1/<?php echo $product_image;?>" width="100%" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="details.php?id_produto=<?php echo $product_id;?>"><?php echo $product_title; ?></a></h3>
                            <P class="price"><?php echo $product_price;?> KZ</P>
                        </div>
                    </div>
                    
                </div>
                <?php
            }    
            
                    ?>
                

            </div>            
         </div>
         <div class="col-md-3">
                <div id="order-sumary" class="box">
                   <div class="box-header"> 
                    <h3>Sumario de encomendas</h3>
                    </div>
                    <p class="text-muted">
                    envios e custos adicionais são calculados baseados no valores entregados .
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Sub-total de todas as  encomenda</td>
                                    <th><?php echo $total;?> KZ</th>
                                </tr>
                                <tr>
                                    <td>Envio da mercadoria</td>
                                    <td><?php if ($total==0) {
                                        echo $total;
                                    }
                                    else {
                                        echo $ship=2500;}?> KZ</td>
                                </tr>
                                <tr class="total">
                                    <td>Taxa :</td>
                                    <th><?php if ($total==0) {
                                        echo $total;
                                    }
                                    else {
                                        echo $total +=$ship;
                                    }?> KZ</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
   </div>

   <?php include ("includes/footer.php");?>
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>