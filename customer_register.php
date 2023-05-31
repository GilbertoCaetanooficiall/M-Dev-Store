<?php
$active="my_account"; 
include('includes/header.php') ?>


   <div id="content">
        <div class="container">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="index.php">HOME</a>
                    </li>
                    <li>
                     Register
                    </li>
                </ul>

            </div>
                <div class="col-md-3">
                    <?php
                         include ("includes/sidebar.php");
                     ?>
                </div>
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <h2> Registra-te</h2>
                                <p class="text-muted">
                                    Torna-te membro e aproveite os nossos maiores descontos da nossa loja.
                                </p>
                            </center>
                            <form action="customer_register.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Contacto</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Seu país</label>
                                    <input type="text" name="country" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Sua Cidade</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="addres" id="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Insere a foto</label>
                                    <input type="file" name="image_1" class="form-control" value="image_1">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-user"> cadastrar</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
   </div>
   
        <?php include ("includes/footer.php");?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php if (isset($_POST['submit'])) {
    $customer_name=$_POST['name'];
    $customer_email=$_POST['email'];
    $customer_phone=$_POST['phone'];
    $customer_country=$_POST['country'];
    $customer_city=$_POST['city'];
    $customer_addres=$_POST['addres'];
    $customer_image=$_FILES['image_1']['name'];
    $customer_password=$_POST['password'];
    $customer_ip=getRealIpUser();

   
    
   
    if (isset($_SESSION['customer_email'])) {
        echo "<script>alert('Já tem uma conta logada')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else {
        $verify="SELECT * FROM customer";
        $verify_check=mysqli_query($con,$verify);
        while ($row=mysqli_fetch_array($verify_check)) {
            $cust=$row['customer_email'];
            $pass=$row['customer_password'];
            

            if ($customer_email==$cust || $customer_password==$pass) {
                echo "<script>alert('Esse email ou senha já está a ser utilizado')</script>";
                echo "<script>window.open('customer_register.php','_self')</script>";
                die();
            } else {
                if (isset($_FILES['image_1']['name'])) {
                    //upload image
                    //to upload image we need  image name, source path and destination path
                    $customer_image=$_FILES['image_1']['name'];
                    
                   
                   //Get the extesion of our image(jpg,png, gift etc)
                   $sext = explode(".", $customer_image);
                    $file_ext = end($sext);
            
            
            
                   //rename the image
                   $customer_image ="fotos_de_cliente_cadastrados".rand(000,999).".".$file_ext;
                  
            
                   $src=$_FILES['image_1']['tmp_name'];
                   $dst="customer/customer_images/".$customer_image;
                  
                  
                   //finally uploaded the image 
                   $upload =move_uploaded_file($src, $dst);
                   
                    //Check Whether the image is uploaded or not
                    //and if the image is not uploaded then we will stop the process and redirect with erro message
                   
                   
                   
                    if ($upload == false) {
                    //set message
                    echo " falhou ao carregar a imagem";
                    //redirect to add category page
                    //stop the process
                    die();
                   }
                
                  
                 
                }
                $sql="INSERT INTO customer SET
        customer_name='$customer_name',
        customer_email='$customer_email',
        customer_contact='$customer_phone',
        customer_city='$customer_city',
        customer_country='$customer_country',
        customer_address='$customer_addres',
        customer_image='$customer_image',
        customer_ip='$customer_ip',
        customer_password='$customer_password'";
        $res=mysqli_query($con,$sql);
    
        $select_cart="SELECT * FROM cart WHERE ip_add='$customer_ip'";
        $res2=mysqli_query($con,$select_cart);
        $check_cart=mysqli_num_rows($res2);
        if ($check_cart>0) {
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('Registro feito com sucesso')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
        }else {
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('Registro feito com sucesso')</script>";
                echo "<script>window.open('index.php','_self')</script>";
        }
            }
            
        }
        
    }
        
   

    
    }
?>