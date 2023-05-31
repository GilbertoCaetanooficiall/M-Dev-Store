<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_admin']) && isset($_GET['image1'])) {
        
    $delete_a_id=$_GET['delete_admin']; 
   
    $delete_a="DELETE FROM admin WHERE admin_id='$delete_a_id'";
    $run_delete=mysqli_query($con,$delete_a);
  echo "<script>alert('Admin apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_user','_self')</script>";
    }

    if (isset($_GET['delete_worker'])) {
        
        $delete_w_id=$_GET['delete_worker']; 
       
        $delete_w="DELETE FROM worker WHERE worker_id='$delete_w_id'";
        $run_delete=mysqli_query($con,$delete_w);
      echo "<script>alert('funcionário apagado com sucesso')</script>";
      echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    
}?>