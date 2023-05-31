<h1 align="center">Mudar palavra-passe</h1>

<form action="" method="post">
    <div class="form-group">
        <label> Palavra-passe antiga :</label>
        <input type="password" name="old_pass" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nova Palavra-passe :</label>
        <input type="password" name="new_pass" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Confirme a Palavra-passe :</label>
        <input type="password" name="confirm_pass" class="form-control" required>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit">
            <i class="fa fa-user-md"></i> Actualizar
        </button>
    </div>

</form>

<?php
$customer_email=$_SESSION['customer_email'];
if (isset($_POST['submit'])) {
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $confirm_pass=$_POST['confirm_pass'];

    $select_pass="SELECT*FROM customer WHERE customer_password='$old_pass'";
    $run_pass=mysqli_query($con,$select_pass);
    $check_pass=mysqli_fetch_array($run_pass);
    if ($check_pass==0) {
        echo "<script>alert('palavra-passe incorrecta')</script>";
        exit();
    }
    
        if ($new_pass!=$confirm_pass) {
            echo "<script>alert('a palavra passe não corresponde')</script>";
            exit();
        }
            $update_pass="UPDATE customer SET customer_password='$new_pass' 
            WHERE customer_email='$customer_email'";
            $run_upade=mysqli_query($con,$update_pass);
            if ($run_upade==true) {
                session_destroy();
            echo "<script>alert('dados foram actualizados com sucesso')</script>";
        echo "<script>window.open('../checkout.php','_self')</script>";
        
            }else {
                echo "<script>alert('tente novamente')</script>";
            }    
        }
    

?>