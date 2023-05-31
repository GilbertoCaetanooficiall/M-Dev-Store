<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {

    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard/Inserir slides
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i> Inserir 
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nome :</label>
                        <div class="col-md-6">
                            <input type="text" name="name_slide" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Link :</label>
                        <div class="col-md-6">
                            <input type="text" name="link_slide" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Imagem do slide :</label>
                        <div class="col-md-6">
                        <input name="image" type="file"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert" class="btn btn-primary form-control" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['insert'])) {

    $name_slide= $_POST['name_slide'];
    $link_slide= $_POST['link_slide'];
   $image_slide=$_FILES['image']['name'];

  if (isset($_FILES['image']['name'])) {

    $sext = explode(".", $image_slide);
        $file_sext = end($sext);
       $image_slide ="imagens_de_slides".rand(000,999).".".$file_sext;


    $image_slide=$_FILES['image']['name'];
    $src_slide=$_FILES['image']['tmp_name'];
    $dst_slide="../admin_worker_area/slides_images/". $image_slide;
    $upload =move_uploaded_file($src_slide, $dst_slide);
   
  } else {
    echo "<script>alert('falhou ao carregar nova imagem')</script>";
       echo "<script>window.open('index.php?view_slide','_self')</script>";
  }
   //2. Create  SQL Query to insert category into databases
   $sql ="INSERT INTO slider SET 
   name_slide='$name_slide',
   link_slide='$link_slide',
   image_slide='$image_slide'";

   //3. Execute the Query and Save in database
   $res=mysqli_query($con, $sql);

   //4. Check whether two query executed or not and data added or not
   if($res==true){
      //Query executed and category added
      echo "<script>alert('slide adicionado com sucesso')</script>";
      echo "<script>window.open('index.php?view_slide','_self')</script>";
     
      //Redirect to manage category page
      
  }
  else {
      
          //echo("Desculpe, verifique a query");
          //Create a ssession variable to display message
          echo "<script>alert('Algo deu errado')</script>";
      echo "<script>window.open('index.php?view_slide','_self')</script>";
         
  }
  
     

       
}

}
?>