<h1 align="center">Edite sua conta</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       
        <label >Nome do cliente :</label>
        
        <input type="text" name="customer_name" class="form-control" required>
    
    </div>
    <div class="form-group">
    
        <label >Email :</label>
        
        <input type="text" name="customer_email" class="form-control" required>
    
    </div>
    <div class="form-group">
        
        <label >País</label>
        
        <input type="text" name="customer_country" class="form-control" required>
    
    </div>

    <div class="form-group">
        
        <label >Cidade</label>
        
        <input type="text" name="customer_city" class="form-control" required>
    
    </div>

    <div class="form-group">
        
        <label >contacto</label>
        
        <input type="tel" name="customer_contact" class="form-control" required>
    
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
