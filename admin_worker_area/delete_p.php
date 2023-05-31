<?php if (!isset($_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_p']) && isset($_GET['image1']) && isset($_GET['image2']) && isset($_GET['image3'])) {
        
    $delete_id=$_GET['delete_p']; 
    $image1=$_GET['image1'];
    $image2=$_GET['image2'];
    $image3=$_GET['image3'];
    
    $delete_p="DELETE FROM products WHERE id_produto='$delete_id'";
    $run_delete=mysqli_query($con,$delete_p);
    $path ="../admin_worker_area/product_images/product_images_1/".$image1;
    $path2 ="../admin_worker_area/product_images/product_images_2/".$image2;
    $path3 ="../admin_worker_area/product_images/product_images_3/".$image3;
  $remove =unlink($path);
  $remove2 =unlink($path2);
  $remove3 =unlink($path3);

  echo "<script>alert('producto apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";
    }
    
}?>