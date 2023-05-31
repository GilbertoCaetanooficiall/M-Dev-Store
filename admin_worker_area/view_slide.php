<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/Ver Slides 

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-edit"></i>  Slides                  
                </h3>

                <div class="panel-body">
                        <?php 
                             $get_slider="SELECT * FROM slider";
                              $run_slider=mysqli_query($con,$get_slider);
                              $n=0;
                                  
                              while ($fetch=mysqli_fetch_assoc($run_slider)) {
                                $slide_id=$fetch['slide_id'];
                                $name_slide=$fetch['name_slide'];
                                $image_slide=$fetch['image_slide'];
                                $n++;
                        ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel panel-heading">
                                        <h3 class="panel-title">
                                            <?php echo $name_slide;?>
                                        </h3>
                                    </div>
                               
                                    <div class="panel-body">
                               
                                         <img src="../admin_worker_area/slides_images/<?php echo  $image_slide;?>" alt="" class="img-responsive">                         
                                    
                                    </div>
                                
                                    <div class="panel-footer">
                                
                                        <center>
                                            <a href="index.php?edit_slide=<?php echo $slide_id;?>" class="pull-right" style="text-decoration: none;"><i class="fa fa-pencil"> Editar</i></a>
                                            <a href="index.php?delete_slide=<?php echo $slide_id. "&image=".$image_slide;?>"class="pull-left" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a>
                                        </center>
                                
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                                               
                            </div>

                            
                        <?php }?>
                </div>

            </div>
        </div>
    </div>
</div>


        
       
   
    
    <?php }?>