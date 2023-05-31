<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
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
                            <input name="admin_name" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email :</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Contacto :</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">País :</label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Cargo :</label>
                        <div class="col-md-6">
                            <select name="admin_job" class="form-control" required>
                                <option disabled>Selecione a cargo</option>
                                <option>Admin</option>
                                <option>Gerente</option>
                                <option>Funcionário</option>
                                 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Foto :</label>
                        <div class="col-md-6">
                            <input name="image_1" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">palavra-passe</label>
                        <div class="col-md-6">
                        <input type="password" name="admin_password" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descrição</label>
                        <div class="col-md-6">
                        <textarea name="admin_desc" cols="19" rows="6" class="form-control"></textarea>
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
        //set message
        echo " falhou ao carregar a imagem";
        //redirect to add category page
        //stop the process
        die();
       }
    
      
     
    }
     

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
        admin_job='$admin_job'
        ";



        //3. Execute the Query and Save in database
        $res3=mysqli_query($con, $sql3);

        //4. Check whether two query executed or not and data added or not
        if($res3==true){
           //Query executed and category added
            $get_admin="SELECT * FROM admin";
            $run_admin=mysqli_query($con,$get_admin);
            $fetch_admin=mysqli_fetch_array($run_admin);
            $admin=$fetch_admin['admin_id'];

           $sql2 ="INSERT INTO worker SET 
           worker_name='$admin_name',
           worker_email='$admin_email',
           worker_password='$admin_password',
           worker_image='$admin_image',
           worker_country='$admin_country',
           worker_contact='$admin_contact',
           worker_job='$admin_job',
           worker_desc='$admin_desc',
           admin_id=$admin";
       
           //3. Execute the Query and Save in database
           $res2=mysqli_query($con, $sql2);
           
           echo "<script>alert('foi adicionado um novo usuário com sucesso')</script>";
           echo "<script>window.open('index.php?view_user','_self')</script>";
          
           //Redirect to manage category page
           
       }
       else {
           
               //echo("Desculpe, verifique a query");
               //Create a ssession variable to display message
              echo " Falhou em adicionar uma nova comida.";
              
       }
      }else if($admin_job=="Funcionário" || $admin_job=="Gerente") {
        $sql2 ="INSERT INTO worker SET 
        worker_name='$admin_name',
        worker_email='$admin_email',
        worker_password='$admin_password',
        worker_image='$admin_image',
        worker_country='$admin_country',
        worker_contact='$admin_contact',
        worker_job='$admin_job',
        worker_desc='$admin_desc'";

        //3. Execute the Query and Save in database
        $res2=mysqli_query($con, $sql2);

        //4. Check whether two query executed or not and data added or not
        if($res2==true){
           //Query executed and category added
           echo "<script>alert('foi adicionado um novo usuário com sucesso')</script>";
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
?>