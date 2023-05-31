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
        
        <input type="text" name="customer_city" class="form-control" value="<?php echo $customer_city;?>" required>
    
    </div>

    <div class="form-group">
        
        <label >contacto</label>
        
        <input type="tel" name="phone" class="form-control" value="<?php echo $customer_contact;?>" required>
    
    </div>

    <div class="form-group">
        
        <label >Endereço</label>
        
        <input type="text" name="customer_address" class="form-control" value="<?php echo $customer_address;?>" required>
    
    </div>

    <div class="form-group ">
        
        <label >Imagem</label>
        
        <input type="file" name="image" class="form-control" required>
        <br>
        <img src="customer_images/<?php echo $customer_image;?>" alt="Mdev Profile" class="img-responsive"  width="200px">
    
    </div>

    <div class="text-center">
        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Actualizar
        </button>
    </div>
</form>
<?php if (isset($_POST['update'])) {
    $update_id=$customer_id;
    $name=$_POST['customer_name'];
    $email=$_POST['customer_email'];
    $country=$_POST['customer_country'];
    $city=$_POST['customer_city'];
    $contact=$_POST['phone'];
    $address=$_POST['customer_address'];
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp,"customer_images/$image");

    $update_customer="UPDATE customer SET 
    customer_name='$name',
    customer_email='$email',
    customer_country='$country',
    customer_city='$city',
    customer_contact='$contact',
    customer_address='$address',
    customer_image='$image'
    WHERE customer_id='$update_id'";

    $run_update=mysqli_query($con,$update_customer);

    if ($run_update) {
        echo "<script>alert('dados foram actualizados com sucesso')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
      
    }
}?>
