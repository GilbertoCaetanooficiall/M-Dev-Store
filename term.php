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
                     Termos e Condições 
                 </li>
            </ul>

        </div>
        <div class="col-md-3">
            <div class="box">
                <ul class="nav nav-pills nav-stacked">
                    <?php
                    $get_terma="SELECT * FROM terms";
                    $run_terma=mysqli_query($con,$get_terma); 
                    $get_terms="SELECT * FROM terms LIMIT 0,1";
                    $run_terms=mysqli_query($con,$get_terms);
                    $count_terms=mysqli_num_rows($run_terma);
                    while ($fetch_terms=mysqli_fetch_array($run_terms)) {
                        $terms_id=$fetch_terms['term_id'];
                        $terms_title=$fetch_terms['term_title'];
                        $terms_desc=$fetch_terms['term_desc'];
                        $terms_link=$fetch_terms['term_link'];
                        ?>
                    <li class="active">
                        <a data-toggle="pill" href="#<?php echo $terms_link;?>" target="_blank" rel="noopener noreferrer">
                        <?php echo $terms_title;?></a>
                    </li>
                <?php
                    }
                    $get_term="SELECT * FROM terms LIMIT 1,$count_terms";
                    $run_term=mysqli_query($con,$get_term);
                    
                    while ($fetch_term=mysqli_fetch_array($run_term)) {
                        $term_id=$fetch_term['term_id'];
                        $term_title=$fetch_term['term_title'];
                        $term_desc=$fetch_term['term_desc'];
                        $term_link=$fetch_term['term_link'];
                    ?>
                    <li>
                        <a data-toggle="pill" href="#<?php echo $term_link;?>" rel="noopener noreferrer">
                        <?php echo $term_title;?></a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
        <div class="box">
            <div class="tab-content">
                <?php
                $get_term="SELECT * FROM terms";
                $run_term=mysqli_query($con,$get_term);
                
                while ($fetch_term=mysqli_fetch_array($run_term)) {
                    $term_id=$fetch_term['term_id'];
                    $term_title=$fetch_term['term_title'];
                    $term_desc=$fetch_term['term_desc'];
                    $term_link=$fetch_term['term_link'];
                ?>
                <div class="tab-pane fade in " id="<?php echo $term_link;?>">
                    <h1 class="tabTitle">
                        <?php echo $term_title;?>
                    </h1>
                    <p class="tabDesc"><?php echo $term_desc;?></p>
                </div>
                <?php }?>
            </div>
        </div>
            
          
      </div>
    </div>
  </div>

<?php include ("includes/footer.php");?>
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>
