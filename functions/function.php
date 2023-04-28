<?php
$host="localhost";
$password="";
$user="root";
$db_name="db_store";
 $con=mysqli_connect($host,$user, $password, $db_name) or die();

    //função getRealIpUser
        function getRealIpUser(){
            switch (true) {
                case(!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP']; 
                case(!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
                case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
                
                default:  return $_SERVER['REMOTE_ADDR'];
            }
        }


    //função adicionar produtos no cart

        function add_cart(){
        global $con;
        if (isset($_GET['add_cart'])) {
            $ip_add= getRealIpUser();
            $p_id=$_GET['add_cart'];
            $product_qty=$_POST['product_qty'];
            $product_size=$_POST['product_size'];
            $check_products="SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
            $res=mysqli_query($con,$check_products);
            if (mysqli_num_rows($res)>0) {
                echo "<script>alert('Este produto já foi adicionado ao carrinho')</script>";
                echo "<script>window.open('details.php?id_produto=$p_id','_self')</script>";
            }
            else {
                
                $sql="INSERT INTO cart SET
                p_id='$p_id',
                ip_add='$ip_add',
                qty='$product_qty',
                size='$product_size'";
                $res=mysqli_query($con,$sql);    
                echo "<script>window.open('details.php?id_produto=$p_id','_self')</script>";
            }
        }
        }
    //função mostrar produtos
        function getpro(){
        global $con;
        $sql="SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
        $res=mysqli_query($con,$sql);
        while ($rows=mysqli_fetch_array($res)) {
            $product_id=$rows['id_produto'];
            $product_title=$rows['product_title'];
            $product_image=$rows['product_image'];
            $product_price=$rows['product_price'];
            
            echo "<div class='col-sm-4 col-sm-6 single'>
            <div class='product'>
                <a href='details.php?id_produto=$product_id'>
                    <img  class= 'img-responsive' src='admin_area/product_images/product_images_1/$product_image'  alt='Product 1' width='100%'>
                </a>
                    <div class='text'>
                        <h3>
                            <a href='details.php?id_produto=$product_id'>
                                $product_title
                            </a>
                        </h3>
                        <p class='price'> $product_price KZ</p>
                        <p class='button'>
                            <a href='details.php?id_produto=$product_id' class='btn btn-default'>Detalhes</a>
                            <a href='details.php?id_produto=$product_id' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'>
                                Add ao carrinho
                                </i>
                            </a>
                        </p>
                    </div>
            </div>
        </div>";

            }

        } 
       //função mostrar categorias de produtos
       
            function getpcats(){
        global $con;
        $sql="SELECT * FROM products_categories";
        $res=mysqli_query($con,$sql);
            while ($rows=mysqli_fetch_array($res)) {
                $p_cat_id=$rows['p_cat_id'];
                $p_cat_title=$rows['p_cat_title'];

                echo"
                    <li>
                        <a href='shop.php?p_cat_id=$p_cat_id'> $p_cat_title</a> 
                    </li>";
                                                    }
                                    }
    //função mostrar categorias
                function getcats(){
                    global $con;
                $sql="SELECT * FROM categories";
                $res=mysqli_query($con,$sql);
                while ($rows=mysqli_fetch_array($res)) {
                    $cat_id=$rows['id_cat'];
                    $cat_title=$rows['cat_title'];
                
                    echo"
                    <li>
                        <a href='shop.php?cat_id=$cat_id'> $cat_title</a> 
                        </li>
                    ";
                }
                        }

    //função mostrar produtos das categorias de produtos
            function getcatspro(){
                global $con;
                if (isset($_GET['p_cat_id'])) {
                    $p_cat_id=$_GET['p_cat_id'];
                    $sql="SELECT * FROM products_categories WHERE p_cat_id= '$p_cat_id'";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($res);
                    $p_cat_title=$row['p_cat_title'];
                    $p_cat_desc=$row['p_cat_desc'];

                    $sql2= "SELECT * FROM products WHERE p_cat_id='$p_cat_id'";
                    $res2=mysqli_query($con,$sql2);
                    $count=mysqli_num_rows($res2);

                    if($count==0){
                        echo "<div class='box'>
                        <h1>Sem productos adicionados</h1>
                        </div>";
                    }
                    else{
                        
                            echo "<div class='box'>
                            <h1>$p_cat_title</h1>
                            <p>$p_cat_desc</p>
                            </div>"; 
                        
                            while ($row=mysqli_fetch_array($res2)) {
                                $product_id=$row['id_produto'];
                                $product_title=$row['product_title'];
                                $product_image=$row['product_image'];
                                $product_price=$row['product_price'];
                                echo "<div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product'>
                    <a href='details.php?id_produto=$product_id'>
                        <img  class= 'img-responsive' src='admin_area/product_images/product_images_1/$product_image'  alt='Product 1' width='100%'>
                    </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?id_produto=$product_id'>
                                    $product_title
                                </a>
                            </h3>
                            <p class='price'> $product_price KZ</p>
                            <p class='button'>
                                <a href='details.php?id_produto=$product_id' class='btn btn-default'>Detalhes</a>
                                <a href='details.php?id_produto=$product_id' class='btn btn-primary'>
                                    <i class='fa fa-shopping-cart'>
                                    Add ao carrinho
                                    </i>
                                </a>
                            </p>
                        </div>
                </div>
                </div>"; 
                            }
                        }
                }
                }
    //função mostrar produtos categorias
         function getcat(){
         global $con;
        if (isset($_GET['cat_id'])) {
        $cat_id=$_GET['cat_id'];
        $sql="SELECT * FROM categories WHERE id_cat= '$cat_id'";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($res);
        $cat_title=$row['cat_title'];
        $cat_desc=$row['cat_desc'];

        $sql2= "SELECT * FROM products WHERE id_cat='$cat_id'";
        $res2=mysqli_query($con,$sql2);
        $count=mysqli_num_rows($res2);

        if($count==0){
            echo "<div class='box'>
            <h1>Sem productos adicionados</h1>
            </div>";
            }
            else{
            
                echo "<div class='box'>
                <h1>$cat_title</h1>
                <p>$cat_desc</p>
                </div>"; 
            
                while ($row=mysqli_fetch_array($res2)) {
                    $product_id=$row['id_produto'];
                    $product_title=$row['product_title'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];
                    echo "<div class='col-md-4 col-sm-6 center-responsive'>
                        <div class='product'>
                        <a href='details.php?id_produto=$product_id'>
                            <img  class= 'img-responsive' src='admin_area/product_images/product_images_1/$product_image'  alt='Product 1' width='100%'>
                        </a>
                            <div class='text'>
                                <h3>
                                    <a href='details.php?id_produto=$product_id'>
                                        $product_title
                                    </a>
                                </h3>
                                <p class='price'> $product_price KZ</p>
                                <p class='button'>
                                    <a href='details.php?id_produto=$product_id' class='btn btn-default'>Detalhes</a>
                                    <a href='details.php?id_produto=$product_id' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'>
                                        Add ao carrinho
                                        </i>
                                    </a>
                                </p>
                            </div>
                                    </div>
                            </div>
                                ";            
                                }
                            }
                        }
                    }
   //função quantidade de intems
        function items(){
        global $con;
        $ip_add= getRealIpUser();
        $sql="SELECT * FROM cart";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        echo $count;
    }
   //função preço total de todos os produtos adicionados
        function total(){
            global $con;
            $ip_add=getRealIpUser();
            $total=0;
            $sql="SELECT * FROM cart WHERE ip_add='$ip_add'";
                $res=mysqli_query($con,$sql);
                while ($record=mysqli_fetch_array($res)) {
                    $produto_id=$record['p_id'];
                    $produto_qty=$record['qty'];
                    
                    $sql2="SELECT *FROM products WHERE id_produto='$produto_id'";
                    $res2=mysqli_query($con,$sql2);
                while ( $bring_price=mysqli_fetch_array($res2)) {
                $price=$bring_price['product_price']*$produto_qty;
                $total += $price;
                }
                    
                }
                echo $total;
            }
    

 //função login para os usuários
    function login(){
    global $con;
    if (isset($_POST['submit'])) {
        $customer_email=$_POST['email'];
        $customer_password=$_POST['password'];
        $customer_ip=getRealIpUser();

        $sql2="SELECT * FROM customer WHERE customer_email='$customer_email' AND customer_password='$customer_password'";
       $res2=mysqli_query($con,$sql2);
       $customer_ip=getRealIpUser();
       $customer_rows=mysqli_num_rows($res2);
       $sql="SELECT * FROM cart WHERE ip_add='$customer_ip'";
       $res3=mysqli_query($con,$sql);
       $check=mysqli_num_rows($res3);
       if ($customer_rows==0) {
        echo "<script>alert('Senha ou email errado!')</script>";
        exit();
       }
       if ($customer_rows==1 AND $check==0) {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Seja bem-vindo $customer_email')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
       }else {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Seja bem-vindo $customer_email')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
       }

       

        }
    }
?>
    
 