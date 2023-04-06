<div class="panel panel-default sidebar-menu">
   <div class="panel-heading">
    <center>
        <img src="customer_images/IMG_06392 (2).jpg" alt="Mdev Profile" width="200px">
    </center>
    <br/>
    <h3 align="center" class="panel-title">
        name: Mr. Gilberto
    </h3>
   </div> 
   <div class="panel-body">
        <ul class="nav-pills nav-stacked nav">
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                <a href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> Minhas encomendas
                
                </a>
            
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
                <a href="my_account.php?pay_offline">
                    
                    <i class="fa fa-bolt"></i>   Paga offline
                
                </a>
            
            </li>
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; };?>">
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-edit"></i> Editar conta
                
                </a>
            
            </li>
            <li class="<?php if(isset($_GET['change_password'])){ echo "active"; } ?>">
                <a href="my_account.php?change_password">
                    
                    <i class="fa fa-key"></i>  Mudar palavra-passe
                
                </a>
            
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i>  Apagar Conta
                
                </a>
            
            </li>
            <li class="<?php if(isset($_GET['logout'])){ echo "active"; } ?>">
                <a href="my_account.php?logout">
                    
                    <i class="fa fa-user"></i> Sair
                
                </a>
            
            </li>
        
        </ul>

   </div>

</div>