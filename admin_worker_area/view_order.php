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
                                    <th>nº :</th>
                                    <th>Cliente :</th>
                                    <th>Contacto :</th>
                                    <th>Série nº:</th>
                                    <th>Producto</th>
                                    <th>Quantidade</th>
                                    <th>Tamanho</th>
                                    <th>Montante</th>
                                    <th> Data </th>
                                    <th>Estado</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                $get_pending_orders="SELECT * FROM pending_orders";
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
                                $get_customer_orders="SELECT * FROM customer_order WHERE order_id='$pending_id'";
                                $run_customer_orders=mysqli_query($con,$get_customer_orders);
                                
                                while ($count_c_o=mysqli_fetch_array($run_customer_orders)) {
                                    $due_amount=$count_c_o['due_amount'];
                                    $order_date=$count_c_o['order_date'];
                                    

                            ?>
                                    <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php
                                    $get_customer2="SELECT * FROM customer WHERE customer_id='$customer_id'";
                                    $run_customer2=mysqli_query($con,$get_customer2);
                                    $rows=mysqli_fetch_array($run_customer2);
                                    $customer_name=$rows['customer_name'];
                                    $customer_contact=$rows['customer_contact'];
                                    echo $customer_name ;?></td>
                                    <td><?php echo  $customer_contact ;?></td>
                                    <td><?php echo  $invoice_no ;?></td>
                                    <td><?php echo $name ;?></td>
                                    <td><?php echo $qty ;?></td>
                                    <td><?php echo $size ;?></td>
                                    <td><?php echo $due_amount ;?> KZ</td>
                                    <td width="100px"><?php echo $order_date ;?></td>
                                    <td><?php if ($order_status=="completo") {
                                        $order_status="Pago";
                                        echo   $order_status;
                                    }else {
                                    echo  $order_status;
                                    } ;?></td>
                                    </tr>
                                <?php }} ?>                                
                                    </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php }?>