<?php 
$active='Shop';
include('includes/header.php'); ?>


   <div id="content">
     <div class="container">
        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="index.php">HOME</a>
                </li>
                <li>
                     Shop
                 </li>
            </ul>

        </div>
        <div class="col-md-3">
            <?php
             include ("includes/sidebar.php");
             ?>
        </div>
        <div class="col-md-9">
       <?php if (!isset($_GET['p_cat_id'])) {
       
       if (!isset($_GET['cat_id'])) {
       echo "
         <div class='box'>
            <h1>Shop</h1>
             <p>
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                 Laborum iure rem officiis architecto! Delectus optio inventore sint nulla asperiores dolor cumque, minus exercitationem necessitatibus recusandae saepe dolore accusamus ut reprehenderit!
             </p>
           </div> "; 
       }
        }
       ?>
            <div class="row">
               
            <?php if (!isset($_GET['p_cat_id'])) {
       
       if (!isset($_GET['cat_id'])) { 
                $per_page=6;
                if (isset($_GET['page'])) {
                    $page =$_GET['page'];
                }
                else{
                    $page=1;
                }
                getpro();
      ?>
          </div>

          <center>
            <ul class="pagination">
               <?php 

               $query= "SELECT * FROM products";
               $results =mysqli_query($con,$query);
               $total_records= mysqli_num_rows($results);
               $total_pages=ceil($total_records/ $per_page);
               echo "
                    <li>
                    <a href='shop.php?page=1'>".'First Page'."</a>
                    </li>
                    ";
                    for ($i=1; $i<=$total_pages ; $i++) {                      # code...
                    echo "<li>
                    <a href='shop.php?page=".$i."'>".$i."</a>
                    </li>";
                }
                    echo "<li>
                    <a href='shop.php?page=".$total_pages."'>".'Last Page'."</a>
                    </li>";
                        
                    }
                }
        
               ?>
            </ul>
          </center>
          
          <?php getcatspro(); ?>
          <?php getcat(); ?>

          
      </div>
    </div>
  </div>

<?php include ("includes/footer.php");?>
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>