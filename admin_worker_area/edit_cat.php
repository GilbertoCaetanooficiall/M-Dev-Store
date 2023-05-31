<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {

    if (isset($_GET['edit_cat'])) {
        $edit_c_id=$_GET['edit_cat'];
    $cat ="SELECT * FROM categories WHERE id_cat='$edit_c_id'";
    $res3=mysqli_query($con,$cat);
    while ($cat_fetch=mysqli_fetch_array($res3)) {
        $edit_cat=$cat_fetch['cat_title'];
    $edit_cat_desc=$cat_fetch['cat_desc'];
    }
         }
    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard/Actualizar Categorias 
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i> Actualizar Categorias 
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Título</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $edit_cat ;?>" name="cat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descrição</label>
                        <div class="col-md-6">
                        <textarea name="desc" cols="19" rows="6" class="form-control"><?php echo $edit_cat_desc ;?></textarea>
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

   $cats= $_POST['cat'];
   $desc= $_POST['desc'];

     

       //2. Create  SQL Query to insert category into databases
       $sql ="UPDATE categories SET 
         cat_title='$cats',
         cat_desc='$desc'
          WHERE id_cat='$edit_c_id'";

         //3. Execute the Query and Save in database
         $res=mysqli_query($con, $sql);

         //4. Check whether two query executed or not and data added or not
         if($res==true){
            //Query executed and category added
            echo "<script>alert('categria actualizada com sucesso')</script>";
            echo "<script>window.open('index.php?view_cat','_self')</script>";
           
            //Redirect to manage category page
            
        }
        else {
            
                //echo("Desculpe, verifique a query");
                //Create a ssession variable to display message
               echo " Falhou em adicionar uma nova comida.";
               
        }
}

}
?>