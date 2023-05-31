<h1>Tens a certeza que queres apagar a sua conta ?</h1>
<hr>
<form action="" method="post">
    <div class="text-center">
    <input type="submit" name="yes" value="Sim, eu quero apagar" class="btn btn-danger">
    <input type="submit" name="no" value="Não, eu não quero apagar" class="btn btn-success">
    </div>
</form>

<?php
$customer_email=$_SESSION['customer_email'];
        if (isset($_POST['yes'])) {
            $delect_customer="DELETE FROM customer WHERE customer_email='$customer_email'";
            $run_delect=mysqli_query($con,$delect_customer);
           if ($run_delect) {
            session_destroy();
            echo "<script>alert('sua conta foi apagada com sucesso')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
           }
        }

        if (isset($_POST['no'])) {
            echo "<script>window.open('my_account.php','_self')</script>";
        }
?>