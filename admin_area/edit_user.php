<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {

    $email=$_SESSION['admin_email'];
        if (isset($_GET['edit_worker'])) {
            $edit_user=$_GET['edit_worker'];
            $select_worker="SELECT * FROM worker WHERE worker_id='$edit_user'";
            $run_select_worker=mysqli_query($con,$select_worker);
            $fetch_worker=mysqli_fetch_assoc($run_select_worker);
            $worker_name= $fetch_worker['worker_name'];
            $worker_email= $fetch_worker['worker_email'];
            $worker_contact= $fetch_worker['worker_contact'];
            $worker_job= $fetch_worker['worker_job'];
            $worker_password= $fetch_worker['worker_password'];
            $worker_image= $fetch_worker['worker_image'];
            $worker_country= $fetch_worker['worker_country'];
            $worker_desc= $fetch_worker['worker_desc'];

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
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-users"></i> Inserir Usuário
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
                                                <select name="admin_job" class="form-control" required>
                                                    <option><?php echo $worker_job ;?></option>
                                                    <option>Admin</option>
                                                    <option>Gerente</option>
                                                    <option>Funcionário</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Foto :</label>
                                            <div class="col-md-6">
                                                <img src="../admin_worker_area/admin_images/<?php echo $worker_image ;?>" alt="" width="60px" height="60px" class="img-responsive">
                                                <br>
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
               $admin_job= $_POST['admin_job'];
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
                    //2. Create  SQL Query to insert category into databases
                  if ($admin_job=="Admin") {
                    $sql3 ="INSERT INTO admin SET 
                    admin_name='$admin_name',
                    admin_email='$admin_email',
                    admin_password='$admin_password',
                    admin_image='$worker_image',
                    admin_country='$admin_country',
                    admin_desc='$admin_desc',
                    admin_contact='$admin_contact',
                    admin_job='$admin_job'";
            
            
            
                    //3. Execute the Query and Save in database
                    $res3=mysqli_query($con, $sql3);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res3==true){
                       //Query executed and category added
                       $sql4 ="DELETE FROM worker WHERE worker_id='$edit_user'"; 
                    $res4=mysqli_query($con, $sql4);
                        
                            
                            echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                            echo "<script>window.open('index.php?view_user','_self')</script>"; 
                        
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }else if($admin_job=="Funcionário" || $admin_job=="Gerente") {
                    $sqlworker ="UPDATE worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc'
                             WHERE worker_id='$edit_user'";
            
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('index.php?view_user','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                    //redirect to add category page
                    //stop the process
                    
                   } else {
                     $path ="../admin_worker_area/admin_images/".$worker_image;
                    $remove =unlink($path);
                    //2. Create  SQL Query to insert category into databases
                  if ($admin_job=="Admin") {
                    $sql3 ="INSERT INTO admin SET 
                    admin_name='$admin_name',
                    admin_email='$admin_email',
                    admin_password='$admin_password',
                    admin_image='$admin_image',
                    admin_country='$admin_country',
                    admin_desc='$admin_desc',
                    admin_contact='$admin_contact',
                    admin_job='$admin_job'";
            
            
            
                    //3. Execute the Query and Save in database
                    $res3=mysqli_query($con, $sql3);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res3==true){
                       //Query executed and category added
                       $sql4 ="DELETE FROM worker WHERE worker_id='$edit_user'"; 
                    $res4=mysqli_query($con, $sql4);
                        
                            
                            echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                            echo "<script>window.open('index.php?view_user','_self')</script>"; 
                        
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }else if($admin_job=="Funcionário" || $admin_job=="Gerente") {
                    $sqlworker ="UPDATE worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_image='$admin_image',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc',
                             WHERE worker_id='$edit_user'";
            
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('index.php?view_user','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                   }
                
                  
                 
                }
                 
            
                   
            }
            
        }
        if (isset($_GET['edit_admin'])) {
            $edit_user=$_GET['edit_admin'];
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-users"></i> Inserir Usuário
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
                                        <select name="admin_job" class="form-control" required>
                                            <option><?php echo $worker_job ;?></option>
                                            <option>Admin</option>
                                            <option>Gerente</option>
                                            <option>Funcionário</option>
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Foto :</label>
                                    <div class="col-md-6">
                                        <img src="../admin_worker_area/admin_images/<?php echo $worker_image ;?>" alt="" width="60px" height="60px" class="img-responsive">
                                        <br>
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
               $admin_job= $_POST['admin_job'];
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
                  //2. Create  SQL Query to insert category into databases
                  if ($admin_job=="Admin") {
                    $sql3 ="UPDATE admin SET 
                    admin_name='$admin_name',
                    admin_email='$admin_email',
                    admin_password='$admin_password',
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
                     
                            
                            echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                            echo "<script>window.open('index.php?view_user','_self')</script>"; 
                        
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  } if((($email!=$worker_email)AND ($admin_job=="Funcionário")) OR (($email!=$worker_email) AND($admin_job=="Gerente"))) {
                    $sqlworker ="INSERT INTO worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_image='$worker_image',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc'
                            ";
                $sql4 ="DELETE FROM admin WHERE admin_id='$edit_user'"; 
                $res4=mysqli_query($con, $sql4);
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('index.php?view_user','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                   if((($email==$worker_email)AND ($admin_job=="Funcionário")) OR (($email==$worker_email) AND($admin_job=="Gerente"))) {
                    $sqlworker ="INSERT INTO worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_image='$worker_image',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc'
                            ";
            $sql4 ="DELETE FROM admin WHERE admin_id='$edit_user'"; 
            $res4=mysqli_query($con, $sql4);
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                        session_destroy();
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('login.php','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                    //redirect to add category page
                    //stop the process
                    
                   }
                   
                   else {
                     $path ="../admin_worker_area/admin_images/".$worker_image;
                    $remove =unlink($path);
                    //2. Create  SQL Query to insert category into databases
                  if ($admin_job=="Admin") {
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
                     
                            
                            echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                            echo "<script>window.open('index.php?view_user','_self')</script>"; 
                        
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  } if((($email!=$worker_email)AND ($admin_job=="Funcionário")) OR (($email!=$worker_email) AND($admin_job=="Gerente"))) {
                    $sqlworker ="INSERT INTO worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_image='$admin_image',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc'
                            ";
            $sql4 ="DELETE FROM admin WHERE admin_id='$edit_user'"; 
            $res4=mysqli_query($con, $sql4);
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('index.php?view_user','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                   if((($email==$worker_email)AND ($admin_job=="Funcionário")) OR (($email==$worker_email) AND($admin_job=="Gerente"))) {
                    $sqlworker ="INSERT INTO worker SET 
                            worker_name='$admin_name',
                            worker_email='$admin_email',
                            worker_password='$admin_password',
                            worker_image='$admin_image',
                            worker_country='$admin_country',
                            worker_contact='$admin_contact',
                            worker_job='$admin_job',
                            worker_desc='$admin_desc'
                            ";
            $sql4 ="DELETE FROM admin WHERE admin_id='$edit_user'"; 
            $res4=mysqli_query($con, $sql4);
                    //3. Execute the Query and Save in database
                    $res2=mysqli_query($con, $sqlworker);
            
                    //4. Check whether two query executed or not and data added or not
                    if($res2==true){
                        session_destroy();
                       //Query executed and category added
                       echo "<script>alert('foi actualizado um novo usuário com sucesso')</script>";
                       echo "<script>window.open('login.php','_self')</script>";
                      
                       //Redirect to manage category page
                       
                   }
                   else {
                       
                           //echo("Desculpe, verifique a query");
                           //Create a ssession variable to display message
                          echo " Falhou em adicionar uma nova comida.";
                          
                   }
                  }
                   }
                
                  
                 
                }
                 
            
                   
            }
            
        }

    
    

}
?>