<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
        if (isset($_GET['edit_profile'])) {
            $edit_user=$_GET['edit_profile'];
            $select_admin="SELECT * FROM admin WHERE admin_id='$edit_user'";
            $run_select_admin=mysqli_query($con,$select_admin);
            $fetch_admin=mysqli_fetch_assoc($run_select_admin);
            $worker_name= $fetch_admin['admin_name'];
            $worker_email= $fetch_admin['admin_email'];
            $worker_contact= $fetch_admin['admin_contact'];
            $worker_job= $fetch_admin['admin_job'];
            $worker_password= $fetch_admin['admin_password'];
            $worker_image= $fetch_admin['admin_image'];
            $worker_country= $fetch_admin['admin_country'];
            $worker_desc= $fetch_admin['admin_desc'];
            $uma=$worker_email;
            $duas=$worker_password;

            ?>
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard/Inserir Usuários
                        </li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">
                    
                    <img src="../admin_worker_area/admin_images/<?php echo $worker_image;?>" width="100%" class="rounded img-responsive">

                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $worker_name;?></span>
                        <span class="thumb-info-type"><?php echo $worker_job;?></span>
                    </div>

                </div>

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-envelope"></i> <span> Email : </span> <?php echo $worker_email;?> <br/>
                        <i class="fa fa-flag"></i> <span> País : </span> <?php echo $worker_country;?> <br/>
                        <i class="fa fa-phone"></i> <span> Contacto : </span> <?php echo $worker_contact;?><br/>
                        </div>

                        <hr class="dotted short" style="margin:0px 10px 0px;">

                        <h5 class="text-muted"> Sobre mim:</h5>

                        <p>
                            <?php echo $worker_desc;?>
                        </p>

                 </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-user"></i> Actualizar Perfil
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Nome : </label>
                                    <div class="col-md-6">
                                        <input name="admin_name" value="<?php echo $worker_name ;?>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="admin_email" value="<?php echo $worker_email ;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contacto :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="admin_contact" value="<?php echo $worker_contact ;?>" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">País :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="admin_country" value="<?php echo $worker_country ;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Cargo :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="admin_job" value="<?php echo $worker_job;?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto :</label>
                                    <div class="col-md-6">
                                        <img src="../admin_worker_area/admin_images/<?php echo $worker_image ;?>" alt="" width="60px" height="60px" class="img-responsive">
                                        <input name="image_1" type="file" value="<?php echo $worker_image ;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">palavra-passe</label>
                                    <div class="col-md-6">
                                    <input type="password" name="admin_password" value="<?php echo $worker_password;?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descrição</label>
                                    <div class="col-md-6">
                                    <textarea name="admin_desc" cols="19" rows="6" class="form-control"><?php echo $worker_desc;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="submit" value="inserir producto" name="insert" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
            <script>tinymce.init({selector:'textarea'});</script>
            
            <?php
            if (isset($_POST['insert'])) {
            
                $admin_name= $_POST['admin_name'];
               $admin_email= $_POST['admin_email'];
               $admin_contact= $_POST['admin_contact'];
               $admin_job= $worker_job;
               $admin_password= $_POST['admin_password'];
               $admin_image= $_FILES['image_1']['name'];
               
               $admin_country= $_POST['admin_country'];
               $admin_desc= $_POST['admin_desc'];
               
               
            
            
                if (isset($_FILES['image_1']['name'])) {
                    //upload image
                    //to upload image we need  image name, source path and destination path
                   
                   
                   
                    $admin_image=$_FILES['image_1']['name'];
                    
                   
                   //Get the extesion of our image(jpg,png, gift etc)
                   $sext = explode(".", $admin_image);
                    $file_ext = end($sext);
            
            
                   //rename the image
                   $admin_image ="1_fotos_de_funcionários_da_G-STORE_".rand(000,999).".".$file_ext;
            
                   $crs=$_FILES['image_1']['tmp_name'];
                   $tsd="../admin_worker_area/admin_images/".$admin_image;
                  
                   //finally uploaded the image 
                   $loadup =move_uploaded_file($crs, $tsd);
                    //Check Whether the image is uploaded or not
                    //and if the image is not uploaded then we will stop the process and redirect with erro message
                   
                   
                   
                    if ($loadup == false) {
                        $sql3 ="UPDATE admin SET 
                        admin_name='$admin_name',
                        admin_email='$admin_email',
                        admin_password='$admin_password',
                        admin_image='$worker_image',
                        admin_country='$admin_country',
                        admin_desc='$admin_desc',
                        admin_contact='$admin_contact',
                        admin_job='$admin_job'
                         WHERE admin_id='$edit_user'";
                
                
                
                        //3. Execute the Query and Save in database
                        $res3=mysqli_query($con, $sql3);
                
                        //4. Check whether two query executed or not and data added or not
                        if($res3==true){
                           //Query executed and category added
                         
                               if ($admin_email!=$worker_email OR $admin_password!=$worker_password) {
                                 session_destroy();
                                echo "<script>alert('perfil actualizado com sucesso')</script>";
                                echo "<script>window.open('login.php','_self')</script>"; 
                            
                               } else {
                                
                                echo "<script>alert('perfil actualizado com sucesso')</script>";
                                echo "<script>window.open('index.php?view_user','_self')</script>"; 
                            
                               }
                               
                          
                           //Redirect to manage category page
                           
                       }
                       
                    
                   }else {
                    $path ="../admin_worker_area/admin_images/".$worker_image;
                    $remove =unlink($path);
                    $sql3 ="UPDATE admin SET 
                    admin_name='$admin_name',
                    admin_email='$admin_email',
                    admin_password='$admin_password',
                    admin_image='$admin_image',
                    admin_country='$admin_country',
                    admin_desc='$admin_desc',
                    admin_contact='$admin_contact',
                    admin_job='$admin_job'
                     WHERE admin_id='$edit_user'";
            
            
            
                    //3. Execute the Query and Save in database
                    $res3=mysqli_query($con, $sql3);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res3==true){
                       //Query executed and category added
                     
                            
                            echo "<script>alert('perfil actualizado com sucesso')</script>";
                            echo "<script>window.open('index.php?view_porfile','_self')</script>"; 
                        
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   
                  
                  }
                   }
                
                  
                 
                }
                 
            
                   //2. Create  SQL Query to insert category into databases
                  
                    
                   
                  }
            }
            
        }

    



?>