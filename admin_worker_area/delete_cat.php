<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_cat'])) {
        
    $delete_c_id=$_GET['delete_cat']; 
   
    $delete_c="DELETE FROM categories WHERE id_cat='$delete_c_id'";
    $run_delete=mysqli_query($con,$delete_c);
  echo "<script>alert('categoria apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_cat','_self')</script>";
    }
    
}?>