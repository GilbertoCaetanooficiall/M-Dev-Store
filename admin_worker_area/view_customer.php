<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
            <i class="fa fa-dashboard"></i>Dashboard/Ver Clientes

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> Clientes                    
                </h3>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Nome:</th>
                                    <th>Imagem :</th>
                                    <th>Email:</th>
                                    <th>Cidade :</th>
                                    <th>País :</th>
                                    <th>Contacto :</th>
                                    <th>Endereço :</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  $get_customer="SELECT * FROM customer";
                                  $run_customer=mysqli_query($con,$get_customer);
                                  $n=0;
                                  
                                  while ($fetch=mysqli_fetch_assoc($run_customer)) {
                                    $customer_id =$fetch['customer_id'];
                                    $customer_name=$fetch['customer_name'];
                                    $customer_email=$fetch['customer_email'];
                                    $customer_city=$fetch['customer_city'];
                                    $customer_country=$fetch['customer_country'];
                                    $customer_contact=$fetch['customer_contact'];
                                    $customer_address=$fetch['customer_address'];
                                    $customer_image=$fetch['customer_image'];
                                    $n++;
                                    ?>

                                    <tr>
                                        <td><?php echo $n;?></td>
                                        <td><?php echo $customer_name;?></td>
                                        <td><img src="../customer/customer_images/<?php echo $customer_image;?>" height="60px" width="60px" class="img-responsive"></td>
                                        <td><?php echo  $customer_email;?></td>
                                        <td><?php echo $customer_city;?></td>
                                        <td><?php echo $customer_country;?></td>
                                        <td><?php echo $customer_contact;?></td>
                                        <td><?php echo $customer_address;?></td>
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