<?php include("includes/db.php");

if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {  
    
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-exl-collapse" >
            <span class="sr-only">toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand cor"><?php echo $worker_job;?></a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i> <?php echo $worker_name; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                <a href="index.php?edit_profile=<?php echo $worker_id?>">
                    
                    <i class="fa fa-fw fa-user"></i>Profile
                    
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i>Products
                        <span class="badge"><?php echo $count;?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-users"></i>Clientes
                        <span class="badge"><?php echo $count2;?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_cat">
                        <i class="fa fa-fw fa-gear"></i>Categorias de produtos
                        <span class="badge"><?php echo $count3;?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Sair
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-exl-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                        <i class="fa fa-fw fa-dashboard"></i> dashboard
                    </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-tag"></i>Productos
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li><a href="index.php?insert_products"> Inserir Productos</a></li>
                    <li><a href="index.php?view_products"> Ver Productos</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-edit"></i>Categorias de Productos
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li><a href="index.php?insert_p_cat"> Inserir Categorias de Productos</a></li>
                    <li><a href="index.php?view_p_cat"> Ver Categorias de Productos</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-edit"></i>Categorias
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="cat" class="collapse">
                    <li><a href="index.php?insert_cat"> Inserir categorias</a></li>
                    <li><a href="index.php?view_cat"> Ver categorias </a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slide">
                    <i class="fa fa-fw fa-gear"></i>Slides
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slide" class="collapse">
                    <li>
                    <a href="index.php?insert_slide"> Inserir Slides </a>
                    </li>
                    <li><a href="index.php?view_slide"> Ver Slides</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-users"></i> Clientes
                    
                </a>
            </li>
            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-shopping-cart"></i> Encomendas
                    
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> Pagamentos
                    
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#user">
                    <i class="fa fa-fw fa-users"></i>Perfil
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="user" class="collapse">
                     <li><a href="index.php?edit_profile=<?php echo $worker_id;?>"> Editar Perfil</a></li>
                    <li><a href="index.php?view_user">Funcionários</a></li>
                </ul>
            </li>
            <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Sair
                    </a>
                </li>
        </ul>
    </div>
</nav>
<?php }?>
 

