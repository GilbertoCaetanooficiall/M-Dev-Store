<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count;?></div>
                        <div>Productos</div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">ver detalhes</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">
                        <?php echo $count2;?>
                        </div>
                        <div>Clientes</div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_customer">
                <div class="panel-footer">
                    <span class="pull-left">ver detalhes</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tag fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">
                        <?php echo $count3;?>
                        </div>
                        <div>Categorias de Productos</div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_p_cat">
                <div class="panel-footer">
                    <span class="pull-left">ver detalhes</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge">
                        <?php echo $count5;?>
                        </div>
                        <div>Encomendas</div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_order">
                <div class="panel-footer">
                    <span class="pull-left">ver detalhes</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">

                <i class="fa fa-money fa-fx"></i> Novas encomendas

                </h3>
            </div>
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-hover table-striped table-bordered">

                    <thead>

                    <tr>
                    <th>nº:</th>
                    <th>Nome do cliente :</th>
                    <th>Invoice nº:</th>
                    <th>Producto</th>
                    <th>Quantidade</th>
                    <th>Estado</th>     
                    </tr>

                    </thead>

                    <tbody>
                   <?php
                   $i=0;
                    $get_pending_orders="SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,4";
                    $run_pending_orders=mysqli_query($con,$get_pending_orders);
                    while ($count4=mysqli_fetch_array($run_pending_orders)) {
                    $pending_id=$count4['order_id'];
                    $qty=$count4['qty'];
                    $size=$count4['size'];
                    $customer_id=$count4['customer_id'];
                    $id_produto=$count4['id_produto'];
                    $invoice_no=$count4['invoice_no'];
                    $order_status=$count4['order_status'];
                    $i++;
                    $get_name="SELECT product_title FROM products WHERE id_produto='$id_produto'";
                    $run_name=mysqli_query($con,$get_name);
                    $fetch_name=mysqli_fetch_array($run_name);
                    $name=$fetch_name['product_title'];
                   ?>
                         <tr>
                        <td><?php echo $i;?></td>
                        <td><?php
                        $get_customer2="SELECT customer_name FROM customer WHERE customer_id='$customer_id'";
                        $run_customer2=mysqli_query($con,$get_customer2);
                        $rows=mysqli_fetch_array($run_customer2);
                        $customer_name=$rows['customer_name'];
                        echo $customer_name ;?></td>
                        <td><?php echo  $invoice_no ;?></td>
                        <td><?php echo $name ;?></td>
                        <td><?php echo $qty ;?></td>
                        <td><?php if ($order_status=="completo") {
                            $order_status="Pago";
                            echo   $order_status;
                        }else {
                           echo  $order_status;
                        } ;?></td>
                    </tr>
                    <?php } ?>
                    </tbody>

                    </table>
                </div>

                <div class="text-right">
        
                    <a href="index.php?view_order">
                        Ver todas as encomendas <i class="fa fa-arrow-circle-right"></i>
                    </a>
        
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">
                    
                    <img src="images/descarregar.jpg" width="100%" class="rounded img-responsive">

                    <div class="thumb-info-title">
                        <span class="thumb-info-inner">Gilberto Caetano</span>
                        <span class="thumb-info-type">Web Developer</span>
                    </div>

                </div>

                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-envelope"></i> <span> Email :</span> marcelocaetano@gmail.com <br/>
                        <i class="fa fa-flag"></i> <span> País :</span> Angola <br/>
                        <i class="fa fa-phone"></i> <span> Contacto :</span> +244-942-232-403<br/>
                        </div>

                        <hr class="dotted short" style="margin:0px 10px 0px;">

                        <h5 class="text-muted"> Sobre mim:</h5>

                        <p>
                            Este Website foi criado pelo Gilberto Caetano, se estás disposto em contactar-me, por favor clica neste link. <br/>
                            <a href="#">Gilberto Caetano</a>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo in accusamus sunt modi ratione reiciendis earum.
                             Commodi quisquam fuga ipsa amet, laborum magni. Minus voluptate mollitia illum labore architecto sed.
                        </p>

                 </div>
            </div>
        </div>
    </div>
</div>

<?php }?>