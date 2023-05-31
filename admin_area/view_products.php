<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/ Ver Productos

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Productos                    
                </h3>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Nome:</th>
                                    <th>Imagem :</th>
                                    <th>Preço:</th>
                                    <th>Vendidos :</th>
                                    <th>Palavra-chave :</th>
                                    <th>Data :</th>
                                    <th>Apagar :</th>
                                    <th>Editar :</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_products="SELECT * FROM products";
                                  $run_products=mysqli_query($con,$get_products);
                                  $n=0;
                                  
                                  while ($fetch=mysqli_fetch_assoc($run_products)) {
                                    $id_products=$fetch['id_produto'];
                                    $name_products=$fetch['product_title'];
                                    $image_products=$fetch['product_image'];
                                    $image_products2=$fetch['product_img2'];
                                    $image_products3=$fetch['product_img3'];
                                    $price_products=$fetch['product_price'];
                                    $keywords_products=$fetch['product_keywords'];
                                    $date_products=$fetch['product_date'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><?php echo $name_products;?></td>
                                        <td><img src="../admin_worker_area/product_images/product_images_1/<?php echo $image_products;?>" height="60px" width="60px" class="img-responsive"></td>
                                        <td><?php echo  $price_products;?></td>
                                        <td><?php
                                        
                                        $get_pending_orders="SELECT * FROM pending_orders WHERE id_produto = '$id_products'";
                                        $run_pending_orders=mysqli_query($con,$get_pending_orders);
                                        $count=mysqli_num_rows($run_pending_orders);
                                        echo $count;
                                        ?></td>
                                        
                                        
                                        <td><?php echo $keywords_products;?></td>
                                        <td><a href=""></a><?php echo $date_products;?></td>
                                        <td><a href="index.php?delete_p=<?php echo $id_products. "&image1=".$image_products. "&image2=".$image_products2. "&image3=".$image_products3;?>" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a></td>
                                        <td><a href="index.php?edit_p=<?php echo $id_products;?>"><i class="fa fa-pencil"> Editar</i></a></td>
                                    </tr>

                                 <?php }?>                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php }?>