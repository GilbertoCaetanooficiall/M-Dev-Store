<?php
$active='Home'; 
include('includes/header.php')
;?>

   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
       <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                    <?php
                         $get_slide="SELECT * FROM slider";
                         $run_slide=mysqli_query($con,$get_slide);
                        $rows=mysqli_num_rows($run_slide);                       
                       
                        $get_slides="SELECT * FROM slider LIMIT 0,1";
                        $run_slides=mysqli_query($con,$get_slides);
                       
                         while ($row=mysqli_fetch_array($run_slides)) {
                        $name_slides=$row['name_slide'];
                        $image_slides=$row['image_slide'];
                        $link_slides=$row['link_slide'];
                        ?>
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   
                   
                      
                        <div class="item active">
                        <a href="<?php echo $link_slides?>">
                        <img src="admin_worker_area/slides_images/<?php echo $image_slides ;?>" alt="<?php echo $name_slides;?>">
                        </a>
                        </div>
                        <?php
                       }
                            $get_slides="SELECT * FROM slider LIMIT 1,$rows";
                            $run_slides=mysqli_query($con,$get_slides);
                            while ($row=mysqli_fetch_array($run_slides)) {
                             $name_slides=$row['name_slide'];
                             $image_slides=$row['image_slide'];
                             ?>
                             <div class="item">
                             <a href="<?php echo $link_slides?>">
                             <img src="admin_worker_area/slides_images/<?php echo $image_slides ;?>" alt="<?php echo $name_slides;?>">
                             </a>
                             </div> 
                             <?php
                       }?>                      
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->
   
<!-- advantages begin-->
   <div id="advantages">
        <div class="container"><!-- container begin-->

            <div class="same-heigth-row"><!--same-heigth-row begins-->
                <div class="col-sm-4">
                    <div class="box same-heigth">
                        <div class="icon">

                            <i class="fa fa-heart"></i>
                       
                        </div>
                        <h3><a href="#">Amamos nossos clientes</a></h3>
                        <p>Nós sabemos providenciar o melhor dos possíveis serviços de sempre. </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-heigth">
                        <div class="icon">

                            <i class="fa fa-tag"></i>
                       
                        </div>
                        <h3><a href="#">Melhores preços</a></h3>
                        <p>Compara-nos com outra loja, para ver qual tem os melhores preços, que estás a espera? não espere mais! </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-heigth">
                        <div class="icon">

                            <i class="fa fa-thumbs-up"></i>
                       
                        </div>
                        <h3><a href="#">Produtos 100% originais</a></h3>
                        <p>Nós só queremos oferecer-te o melhor e os originais produtos </p>
                    </div>
                </div>
                
            </div><!-- same-heigth-row finishes-->

        </div><!-- advantages finishes-->
   </div><!-- advantages finishes-->

   <div id="hot"><!-- hot begin -->

        <div class="box"> <!--box begin -->

            <div class="container">
                <div class="col-md-12">

                        <h2>
                             Últimos lançamentos
                        </h2>
                </div>
            </div>
        </div>
   </div><!-- hot finishes-->

   <div id="content" class="container"><!-- begins-->  
        <div class="row">
            <?php
            getpro();
            ?>
            
        </div>
   </div> <!--End -->

   <?php
     include("includes/footer.php");?>
   

   <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>