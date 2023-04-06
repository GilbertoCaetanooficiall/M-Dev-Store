<?php include('includes/header.php') ?>


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
                            <form action="customer_register.php" method="post">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Contacto</label>
                                    <input type="tel" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Seu país</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" name="addres" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Insere a foto</label>
                                    <input type="file" name="image" class="form-control" required>
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