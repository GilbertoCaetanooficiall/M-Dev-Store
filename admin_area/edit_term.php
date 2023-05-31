<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {

    if (isset($_GET['edit_term'])) {
        $edit_term=$_GET['edit_term'];
    $term ="SELECT * FROM terms WHERE term_title='$edit_t_id'";
    $res3=mysqli_query($con,$term);
    while ($term_fetch=mysqli_fetch_array($res3)) {
        $edit_term_title=$term_fetch['term_title'];
        $edit_term_link=$term_fetch['term_link'];
    $edit_term_desc=$term_fetch['term_desc'];
    }
         }
    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard/Actualizar regulamento
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil"></i> Actualizar Regulamento
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Título</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $edit_term_title ;?>" name="term_title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">ID :</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php echo $edit_term_link ;?>" name="term_link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descrição</label>
                        <div class="col-md-6">
                        <textarea name="term_desc" cols="19" rows="6" class="form-control"><?php echo $edit_term_desc ;?></textarea>
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

   $term_title= $_POST['term_title'];
   $term_link= $_POST['term_link'];
   $term_desc= $_POST['term_desc'];

     

       //2. Create  SQL Query to insert category into databases
       $sql ="UPDATE terms SET 
         term_title='$term_title',
         term_desc='$term_desc',
         term_link='$term_link'
          WHERE term_id='$edit_term'";

         //3. Execute the Query and Save in database
         $res=mysqli_query($con, $sql);

         //4. Check whether two query executed or not and data added or not
         if($res==true){
            //Query executed and category added
            echo "<script>alert('regulamento actualizado com sucesso')</script>";
            echo "<script>window.open('index.php?view_term','_self')</script>";
           
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