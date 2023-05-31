<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/ Ver Termos

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-edit"></i> Politicas e regulamentos                
                </h3>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nº:</th>
                                    <th>Nome:</th>
                                    <th>Descrição :</th>
                                    <th>Apagar :</th>
                                    <th>Editar :</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_terms="SELECT * FROM terms";
                                  $run_terms=mysqli_query($con,$get_terms);
                                  $n=0;
                                  
                                  while ($fetch=mysqli_fetch_assoc($run_terms)) {
                                    $id_terms=$fetch['term_id'];
                                    $terms_title=$fetch['term_title'];
                                    $terms_desc=$fetch['term_desc'];
                                    $terms_link=$fetch['term_link'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td width="25"><?php echo $n;?></td>
                                        <td width="100"><?php echo  $terms_title;?></td>
                                        <td width="500"><?php echo $terms_desc;?></td>
                                        <td width="100"><a href="index.php?delete_term=<?php echo $id_terms;?>" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a></td>
                                        <td width="100"><a href="index.php?edit_term=<?php echo $id_terms;?>"><i class="fa fa-pencil"> Editar</i></a></td>
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