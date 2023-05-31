<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard/ Inserir Produtos
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Inserir produtos
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Título do Produto </label>
                        <div class="col-md-6">
                            <input name="product_title" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Categorias</label>
                        <div class="col-md-6">
                            <select name="cat" class="form-control" required>
                                <option>Selecione a categoria</option>
                                 <?php $gets_cats="SELECT * FROM categories";
                                     $res=mysqli_query($con,$gets_cats);
                                    while ($row=mysqli_fetch_array($res)) {
                                        $cats_id=$row['id_cat'];
                                         $cats_title=$row['cat_title'];
                                
                                         echo " 
                                             <option value='$cats_id'>$cats_title</option>
                                                 ";
                                     } 
                                 ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Categoria de productos</label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control" required>
                                <option>Selecione a categoria de productos</option>
                                 <?php $gets_products_cats="SELECT * FROM products_categories";
                                     $res=mysqli_query($con,$gets_products_cats);
                                    while ($row=mysqli_fetch_array($res)) {
                                        $products_cats_id=$row['p_cat_id'];
                                         $products_cats_title=$row['p_cat_title'];
                                
                                         echo " 
                                             <option value='$products_cats_id' required>$products_cats_title</option>
                                                 ";
                                     } 
                                 ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Imagens dos productos 1</label>
                        <div class="col-md-6">
                            <input name="image_1" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Imagens dos productos 2</label>
                        <div class="col-md-6">
                            <input name="image_2" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Imagens dos productos 3</label>
                        <div class="col-md-6">
                            <input name="image_3" type="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Preço do producto</label>
                        <div class="col-md-6">
                        <input type="number" name="price" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">palavra-chave do producto</label>
                        <div class="col-md-6">
                        <input type="text" name="keywords" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descrição do producto</label>
                        <div class="col-md-6">
                        <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
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

    $product_title= $_POST['product_title'];
   $cats= $_POST['cat'];
   $product_cat= $_POST['product_cat'];
   $product_price= $_POST['price'];
   $product_keywords= $_POST['keywords'];
   $product_desc= $_POST['product_desc'];
   $product_image=$_FILES['image_1']['name'];
   $product_image2=$_FILES['image_2']['name'];
   $product_image3=$_FILES['image_3']['name'];
   


    if (isset($_FILES['image_1']['name']) && isset($_FILES['image_2']['name']) && isset($_FILES['image_3']['name'])) {
        //upload image
        //to upload image we need  image name, source path and destination path
        $product_image=$_FILES['image_1']['name'];
        $product_image2=$_FILES['image_2']['name'];
        $product_image3=$_FILES['image_3']['name'];
       
       //Get the extesion of our image(jpg,png, gift etc)
       $sext = explode(".", $product_image);
        $file_ext = end($sext);
        $sext_2= explode(".", $product_image2);
        $file_ext_2 = end($sext_2);
       $sext_3 = explode(".", $product_image3);
        $file_ext_3 = end($sext_3);


       //rename the image
       $product_image ="1_fotos_de_produtos_".rand(000,999).".".$file_ext;
       $product_image2 ="2_fotos_de_produtos_".rand(000,999).".".$file_ext_2;
       $product_image3 ="3_fotos_de_produtos_".rand(000,999).".".$file_ext_3;

       $src=$_FILES['image_1']['tmp_name'];
       $src2=$_FILES['image_2']['tmp_name'];
       $src3=$_FILES['image_3']['tmp_name'];
       $dst="../admin_worker_area/product_images/product_images_1/".$product_image;
       $dst2="../admin_worker_area/product_images/product_images_2/".$product_image2;
       $dst3="../admin_worker_area/product_images/product_images_3/".$product_image3;
      
       //finally uploaded the image 
       $upload =move_uploaded_file($src, $dst);
       $upload2 =move_uploaded_file( $src2, $dst2);
       $upload3 =move_uploaded_file( $src3, $dst3);
        //Check Whether the image is uploaded or not
        //and if the image is not uploaded then we will stop the process and redirect with erro message
       
       
       
        if ($upload && $upload2 && $upload3 == false) {
        //set message
        echo " falhou ao carregar a imagem";
        //redirect to add category page
        //stop the process
        die();
       }
    
      
     
    }
     

       //2. Create  SQL Query to insert category into databases
       $sql2 ="INSERT INTO products SET 
         product_title='$product_title',
         p_cat_id='$product_cat',
         id_cat='$cats',
         product_price='$product_price',
         product_image='$product_image',
         product_img2='$product_image2',
         product_img3='$product_image3',
         product_desc='$product_desc',
         product_keywords='$product_keywords',
         product_date= NOW()
         ";

         //3. Execute the Query and Save in database
         $res2=mysqli_query($con, $sql2);

         //4. Check whether two query executed or not and data added or not
         if($res2==true){
            //Query executed and category added
            echo "<script>alert('foi adicionado um novo producto com sucesso')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
           
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