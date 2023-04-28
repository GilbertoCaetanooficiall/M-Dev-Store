<?php include("includes/header.php") ;?>


  <div id="content">
        <div class="container">
            <div class="col-md-12">

                <ul class="breadcrumb">
                     <li><a href="index.php">HOME</a></li>
                     <li>Shop</li>
                     <li>
                    <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                 </li>
                 <li> <?php echo $product_title; ?></li>
                </ul>

           </div>
            <div class="col-md-3">
            <?php
             include ("includes/sidebar.php");
             ?>
            </div>
      
           <div class="col-md-9">
            <div id="productMain" class="row">
                <div class="col-sm-6">
                    <div id="mainImage">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center><img  src="admin_area/product_images/product_images_1/<?php echo $product_image;?>" alt="product 3-a"height="400px" width="400px"></center>
                                </div>
                                <div class="item">
                                    <center><img src="admin_area/product_images/product_images_2/<?php echo $product_img2;?>" alt="product 3-b" height="400px" width="400px"></center>
                                </div>
                                <div class="item">
                                    <center><img src="admin_area/product_images/product_images_3/<?php echo $product_img3;?>" alt="product 3-c"height="400px" width="400px"></center>
                                </div>
                            </div>
                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

               <div class="col-sm-6">
                 <div class="box">
                    <h1 class="text center"><?php echo $product_title;?> </h1>
                    <?php add_cart();?>
                    <form action="details.php?add_cart=<?php echo $produto_id; ?>" class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label for="" class="col-md-5 control-label">Quantidade de produtos</label>
                            <div class="col-md-7">
                                <select name="product_qty" class="form-control"oninput="SetCustomValidity('')"
                                oninvalid="SetCustomValidity('precisa de ter pelo menos um par selecionado')">
                                    <option selected disabled>numero de pares</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option >3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Tamanho do produto</label>
                            <div class="col-md-7">
                                <select name="product_size" class="form-control" required >
                                <option disabled selected>selecione o tamanho</option>
                                <option>36</option>
                                <option>37</option>
                                <option>38</option>
                                <option>39</option>
                                <option>40</option>
                                </select>
                            </div>
                        </div>
                        <p class="price"><?php echo $product_price;?> KZ</p>
                        <p class="text-center button">
                            <button  type="submit" name="submit" class="btn btn-primary i fa fa-shopping-cart">
                                 adicionar ao carrinho
                                </button></p>
                    </form>
                </div>
                    
                <div class="row" id="thumbs">
                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="0" class="thumb">
                            <img  src="admin_area/product_images/product_images_1/<?php echo $product_image;?>" alt="product 3-a" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="1" class="thumb">
                            <img src="admin_area/product_images/product_images_2/<?php echo $product_img2;?>" alt="product 3-b" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="2" class="thumb">
                            <img src="admin_area/product_images/product_images_3/<?php echo $product_img3;?>" alt="product 3-c" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
               </div>
            </div>

            <div class="box" id="details">
                     <h4>Detalhes do produto</h4>
                 <p>
                   <?php echo $product_desc;?>
                </p>
                <h4>Tamanho</h4>
                <ul>
                    <li>37</li>
                    <li>40</li>
                    <li>42</li>
                    <hr>
                </ul>
            </div>
            <div id="row same-heigth-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same heigth headline">
                        <h3 class="text-center">Produtos que talvez possas gostar</h3>
                    </div>
                </div>
                <?php 
                 
                    $esc=$_GET['id_produto'];
                    $sql="SELECT * FROM products WHERE id_produto !='$esc' AND p_cat_id='$p_cat_id' ORDER BY RAND() LIMIT 1,3 ";
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
                            <img src="admin_area/product_images/product_images_1/<?php echo $product_image;?>" width="100%" class="img-responsive">
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
    </div>
  </div>


<?php include ("includes/footer.php");?>
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>