<?php if (!isset($_SESSION['worker_email'])) {
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