<?php $customer_email=$_SESSION['customer_email'];
    $select_customer="SELECT * FROM customer WHERE customer_email='$customer_email'";
    $run_customer=mysqli_query($con,$select_customer);
    $rows=mysqli_fetch_array($run_customer);
    $customer_id=$rows['customer_id'];
    $customer_name=$rows['customer_name'];
    $customer_country=$rows['customer_country'];
    $customer_city=$rows['customer_city'];
    $customer_contact=$rows['customer_contact'];
    $customer_image=$rows['customer_image'];
    $customer_address=$rows['customer_address'];
?>

<h1 align="center">Edite sua conta</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       
        <label >Nome do cliente :</label>
        
        <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name;?>" required>
    
    </div>
    <div class="form-group">
    
        <label >Email :</label>
        
        <input type="email" name="customer_email" class="form-control" value="<?php echo $customer_email;?>" required>
    
    </div>
    <div class="form-group">
        
        <label >País</label>
        
        <input type="text" name="customer_country" class="form-control" value="<?php echo $customer_country;?>" required>
    
    </div>

    <div class="form-group">
        
        <label >Cidade</label>
        
        <input type="text" name="customer_city" class="form-control" required>
    
    </div>

    <div class="form-group">
        
        <label >contacto</label>
        
        <input type="tel" name="phone" class="form-control" required>
    
    </div>

    <div class="form-group">
        
        <label >Endereço</label>
        
        <input type="text" name="customer_address" class="form-control" required>
    
    </div>

    <div class="form-group ">
        
        <label >Imagem</label>
        
        <input type="file" name="image" class="form-control" required>
        <br>
        <img src="customer_images/IMG_06392 (2).jpg" alt="Mdev Profile" class="img-responsive"  width="200px">
    
    </div>

    <div class="text-center">
        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Actualizar
        </button>
    </div>
</form>
