<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_p_cat'])) {
        
    $delete_p_id=$_GET['delete_p_cat']; 
   
    $delete_p="DELETE FROM products_categories WHERE p_cat_id='$delete_p_id'";
    $run_delete=mysqli_query($con,$delete_p);
  echo "<script>alert('categoria de producto apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_p_cat','_self')</script>";
    }
    
}?>