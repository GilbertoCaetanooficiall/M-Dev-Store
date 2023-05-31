<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_slide']) && isset($_GET['image'])) {
        
    $slide_id=$_GET['delete_slide']; 
    $slide=$_GET['image'];
    
    $delete_slide="DELETE FROM slider WHERE slide_id='$slide_id'";
    $run_delete=mysqli_query($con,$delete_slide);
    $path="../admin_worker_area/slides_images/".$slide;
  $remove =unlink($path);

  echo "<script>alert('slide apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_slide','_self')</script>";
    }
    
}?>