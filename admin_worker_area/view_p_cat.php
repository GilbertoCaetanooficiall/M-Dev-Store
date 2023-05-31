<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/ Ver Categorias de Produtos

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-edit"></i> Categorias de Produtos                  
                </h3>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Nome:</th>
                                    <th>Descrição :</th>
                                    <th>Apagar :</th>
                                    <th>Editar :</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_products_categories="SELECT * FROM products_categories";
                                  $run_products_categories=mysqli_query($con,$get_products_categories);
                                  $n=0;
                                  
                                  while ($fetch=mysqli_fetch_assoc($run_products_categories)) {
                                    $id_products_categories=$fetch['p_cat_id'];
                                    $p_cat_title=$fetch['p_cat_title'];
                                    $p_cat_desc=$fetch['p_cat_desc'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td width="25"><?php echo $n;?></td>
                                        <td width="100"><?php echo  $p_cat_title;?></td>
                                        <td width="500"><?php echo $p_cat_desc;?></td>
                                        <td width="100"><a href="index.php?delete_p_cat=<?php echo $id_products_categories;?>" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a></td>
                                        <td width="100"><a href="index.php?edit_p_cat=<?php echo $id_products_categories;?>"><i class="fa fa-pencil"> Editar</i></a></td>
                                    </tr>

                                 <?php }?>                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php }?>