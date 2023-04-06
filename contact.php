<?php 
$active='Contact Us';
include('includes/header.php'); ?>


   <div id="content">
        <div class="container">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="index.php">HOME</a>
                    </li>
                    <li>
                     Shop
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
                                <h2> Sinta-se livre de contactar-nos</h2>
                                <p class="text-muted">
                                    Se tu tens alguma questão, não exite em contactar-nos. Nosso apoio ao cliente trabalha <strong>24/7</strong>
                                </p>
                            </center>
                            <form action="contact.php" method="post">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Assunto</label>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mensagem</label>
                                    <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-user-md"> enviar mensagem</i>
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