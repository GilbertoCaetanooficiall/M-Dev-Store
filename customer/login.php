
                
                    <div class="box">
                        <div class="header">
                            <center>
                                <h2> Login</h2>
                                <p class="text-muted">
                                    Se já és mebmbro desfrute dos melhores desconto que oferecemos.
                                </p>
                            </center>
                            <form action="checkout.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-sign-in"> Entrar</i>
                                    </button>
                                </div>
                            </form>
                            <?php
                               login();
                            ?>
                            <center>
                                <a href="customer_register.php">
                                    <h3>Ainda não é membro? Registe-se já</h3>
                                </a>
                            </center>
                        </div>
                    </div>
                
        </div>
   </div>
   
      
</body>
</html>