<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/ Ver Productos

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users"></i> ADM                    
                </h3>

                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Imagem :</th>
                                    <th>Nome:</th>
                                    <th>Email:</th>
                                    <th>Contacto :</th>
                                    <th>País :</th>
                                    <th>Descrição :</th>
                                    <th>Cargo :</th>
                                    <th>Apagar :</th>
                                    <th>Editar :</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_admin="SELECT * FROM admin";
                                  $run_admin=mysqli_query($con,$get_admin);
                                  $n=0;
                                  
                                  while ($fetch_admin=mysqli_fetch_assoc($run_admin)) {
                                    $admin_id =$fetch_admin['admin_id'];
                                    $admin_name=$fetch_admin['admin_name'];
                                    $admin_email=$fetch_admin['admin_email'];
                                    $admin_contact=$fetch_admin['admin_contact'];
                                    $admin_image=$fetch_admin['admin_image'];
                                    $admin_job=$fetch_admin['admin_job'];
                                    $admin_desc=$fetch_admin['admin_desc'];
                                    $admin_country=$fetch_admin['admin_country'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><img src="../admin_worker_area/admin_images/<?php echo $admin_image;?>" height="60px" width="60px" class="img-responsive"></td>
                                        <td><?php echo $admin_name;?></td>
                                        <td><?php echo  $admin_email;?></td>
                                        <td><?php echo $admin_contact;?></td>
                                        <td><?php echo $admin_country;?></td>
                                        <td width="150"><?php echo $admin_desc;?></td>
                                        <td><?php echo $admin_job;?></td>
                                        <td><a href="index.php?delete_admin=<?php echo $admin_id. "&image1=".$admin_image;?>" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a></td>
                                        <td><a href="index.php?edit_admin=<?php echo $admin_id;?>"><i class="fa fa-pencil"> Editar</i></a></td>
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

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users"></i> Funcionários                    
                </h3>

                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Imagem :</th>
                                    <th>Nome:</th>
                                    <th>Email:</th>
                                    <th>Contacto :</th>
                                    <th>País :</th>
                                    <th>Descrição :</th>
                                    <th>Cargo :</th>
                                    <th>Apagar :</th>
                                    <th>Editar :</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_worker="SELECT * FROM worker";
                                  $run_worker=mysqli_query($con,$get_worker);
                                  $n=0;
                                  
                                  while ($fetch_worker=mysqli_fetch_assoc($run_worker)) {
                                    $worker_id =$fetch_worker['worker_id'];
                                    $worker_name=$fetch_worker['worker_name'];
                                    $worker_email=$fetch_worker['worker_email'];
                                    $worker_contact=$fetch_worker['worker_contact'];
                                    $worker_image=$fetch_worker['worker_image'];
                                    $worker_job=$fetch_worker['worker_job'];
                                    $worker_desc=$fetch_worker['worker_desc'];
                                    $worker_country=$fetch_worker['worker_country'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><img src="../admin_worker_area/admin_images/<?php echo $worker_image;?>" height="60px" width="60px" class="img-responsive"></td>
                                        <td><?php echo $worker_name;?></td>
                                        <td><?php echo  $worker_email;?></td>
                                        <td><?php echo $worker_contact;?></td>
                                        <td><?php echo $worker_country;?></td>
                                        <td width="150"><?php echo $worker_desc;?></td>
                                        <td><?php echo $worker_job;?></td>
                                        <td><a href="index.php?delete_worker=<?php echo $worker_id. "&image1=".$worker_image;?>" style="color: red; text-decoration: none;"><i class="fa fa-trash-o"> Apagar</i></a></td>
                                        <td><a href="index.php?edit_worker=<?php echo $worker_id;?>"><i class="fa fa-pencil"> Editar</i></a></td>
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