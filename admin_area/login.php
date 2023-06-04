<?php session_start();
        include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Admin Login</title>
</head>
<body>
<div class="container">
    <div class="content first-content">
        <div class="first-column">
            <h2 class="title title-primary">Bem-vindo Chefe</h2>
            <p class="description description-primary">Mantem-te conectado</p>
            <p class="description description-primary">por favor entre com seus dados pessoais</p>
            <button id="signin" class="btn btn-primary">Entrar</button>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Funcionario Login</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a href="#" class="link-social-media">
                            <li class="item-social-media"><i class="fa fa-facebook"></i></li>
                        </a>
                        <a href="#" class="link-social-media">
                            <li class="item-social-media"><i class="fa fa-instagram"></i></li>
                        </a>
                    </ul>
                </div>
                <p class="description description-second">Segue nossas redes sociais</p>
                <form class="form" method="post" enctype="multipart/form-data">
                    <label class="label-input" for="">
                        <i class="fa fa-envelope icon-modify"></i>
                         <input type="email" name="worker_email" placeholder="Email" required>
                    </label>

                    <label class="label-input" >
                        <i class="fa fa-lock icon-modify"></i>
                        <input type="password" name="worker_pass" placeholder="palavra-passe" required>
                    </label>
                    <a href="#" class="password">Esqueceu sua Senha ? </a>
                    <button  class="btn btn-second" name="funcionario">Entrar</button>
                </form>
            </div>
        </div>
        <div class="content second-content">
        <div class="first-column">
            <h2 class="title title-primary">Bem-vindo <br/> Bora bumbar</h2>
            <p class="description description-primary">Segue nossas redes sociais</p>
            <p class="description description-primary">e continue com a nossa maravilhosa jornada</p>
            <button id="signup" class="btn btn-primary">Entrar</button>
        </div>
        <div class="second-column">
            <h2 class="title title-second">Admin Login</h2>
            <div class="social-media">
                    <ul class="list-social-media">
                        <a href="#" class="link-social-media">
                            <li class="item-social-media"><i class="fa fa-facebook"></i></li>
                        </a>
                        <a href="#" class="link-social-media">
                            <li class="item-social-media"><i class="fa fa-instagram"></i></li>
                        </a>
                    </ul>
                </div>
                <p class="description description-second">Ou use seu email para se registrar</p>
                <form class="form" method="post">
                <label class="label-input" for="">
                        <i class="fa fa-envelope icon-modify"></i>
                         <input type="email" name="admin_email" placeholder="Email" required>
                    </label>

                    <label class="label-input" >
                        <i class="fa fa-lock icon-modify"></i>
                        <input type="password" name="admin_pass" placeholder="palavra-passe" required>
                    </label>
                    <a href="#" class="password">Esqueceu sua Senha ? </a>
                    <button  class="btn btn-second" name="admin">entrar</button>
                </form>
                <?php if (isset($_POST['funcionario'])) {
                $worker_email=$_POST['worker_email'];
                $worker_password=$_POST['worker_pass'];

    $select_worker="SELECT * FROM worker WHERE worker_email='$worker_email' AND worker_password='$worker_password'";
    $run_worker=mysqli_query($con,$select_worker);
    $count=mysqli_num_rows($run_worker);
    if ($count==1) {
        $_SESSION['worker_email']=$worker_email;
        echo "<script>console.log('Bem-vindo $worker_email')</script>";
                echo "<script>window.open('../admin_worker_area/index.php?dashboard','_self')</script>";
    } else {
        echo "<script>alert('Email ou palavra-passe errada')</script>";
    }
}
if (isset($_POST['admin'])) {
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_pass'];

    $select_admin="SELECT * FROM admin WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
    $run_admin=mysqli_query($con,$select_admin);
    $count2=mysqli_num_rows($run_admin);
    if ($count2==1) {
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('Bem-vindo $admin_email')</script>";
                echo "<script>window.open('index.php?dashboard','_self')</script>";
    }else {
        echo "<script>alert('Email ou palavra-passe errada')</script>";
    }
}?>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>

