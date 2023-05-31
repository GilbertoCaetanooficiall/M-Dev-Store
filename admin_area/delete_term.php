<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_term'])) {
        
    $delete_term=$_GET['delete_term']; 
   
    $delete_t="DELETE FROM terms WHERE term_id='$delete_term'";
    $run_delete=mysqli_query($con,$delete_t);
  echo "<script>alert('regulamento apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_term','_self')</script>";
    }
    
}?>