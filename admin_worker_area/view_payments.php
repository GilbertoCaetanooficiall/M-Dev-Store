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
                                    <th>nº:</th>
                                    <th>Série nº:</th>
                                    <th>Montante pago :</th>
                                    <th>Banco :</th>
                                    <th>referência :</th>
                                    <th>Código do pagamento :</th>
                                    <th> Data </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                $get_payements="SELECT * FROM payments";
                                $run_payements=mysqli_query($con,$get_payements);
                                while ($payements=mysqli_fetch_array($run_payements)) {
                                $payments_id =$payements['payments_id'];
                                $invoice_no=$payements['invoice_no'];
                                $due_amount=$payements['due_amount'];
                                $payment_mode=$payements['payment_mode'];
                                $ref_no=$payements['ref_no'];
                                $code=$payements['code'];
                                $payments_date=$payements['payments_date'];
                                $i++;
                                    

                            ?>
                                    <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $invoice_no ;?></td>
                                    <td><?php echo  $due_amount ;?> KZ</td>
                                    <td><?php echo  $payment_mode ;?></td>
                                    <td><?php echo $ref_no ;?></td>
                                    <td><?php echo $code ;?></td>
                                    <td><?php echo $payments_date ;?></td>
                                    <?php } ?>                                
                                    </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <?php }?>