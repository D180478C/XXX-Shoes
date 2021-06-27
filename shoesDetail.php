<?php
include('config.php');
//显示产品详细的资料

if(isset($_GET['product_id'])){

	$product_id=$_GET['product_id'];

    $sql="SELECT * FROM product
    WHERE product_id = '".$product_id."'";
  $result=$conn->query($sql);
}

if(isset($_POST['submit'])){ 	

    $category_id=$_POST['category_id'];
    $product_id=$_POST['product_id'];
    $shoes_types=$_POST['shoes_types'];
    $shoes_size=$_POST['shoes_size'];
    $colours=$_POST['colours'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $shoes_name=$_POST['shoes_name'];
    $shoes_img = $shoes_name.'.jpg';
    $target_dir = "shoes_img/";
    
    $conn->close();
   
}

  $sql="SELECT * FROM product LEFT JOIN category on product.category_id= category.shoes_id WHERE product_id='$product_id'";
   
  $result=$conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shoes Detail</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>


<div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
    <div class="container py-2 py-md-5">
      <div class="row align-items-start">
        <div class="col-md-2">
          <ul class="custom-menu">
          <li><a href="home.php">Home</a></li>
            <li><a href="fullList.php">Product List</a></li>
            <li><a href="displayitem.php">Branding List</a></li>
            <li class="active"><a href="insertitem.php">Insert New Brand</a></li>
            <li class="active"><a href="shoesProduct.php">Insert New Product</a></li>  
          </ul>
        </div>

            

            <div class="col-md-4 d-none d-md-block">
                <h3>Admin tool</h3>
                <p><em>Welcome to XXX Shoes Official Website Administration Page! Please ensure the product details were updated to lastest information. <br> <a href="#">t.co/v82jsk</a></em></p>
            </div>

        </div>
    </div>
</div>

  <nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="fullList.php"> << Back </a>
      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>
    </div>
  </nav>

  <main id="main">

  <?php
                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
             
                              $category_id=$row['category_id'];
                              $product_id=$row['product_id'];
                              $shoes_img=$row['shoes_img'];                 
                              $shoes_name=$row['shoes_name'];
                              $shoes_size=$row['shoes_size'];
                              $quantity=$row['quantity'];                 
                              $price=$row['price'];
                              $shoes_id=$row['shoes_id'];
                              $shoes_types=$row['shoes_types'];
                              $brand=$row['brand'];
                              $colours=$row['colours'];                              
                              
                            }
                          }
                        ?>   

    <section class="section">
      <div class="container">
        <div class="row mb-4 align-items-center">
          <div class="col-md-6" data-aos="fade-up">
            <h1><?php echo $shoes_name;?></h1>
          </div>
        </div>
      </div>

<div class="site-section pb-0">
  <div class="container">
    <div class="row align-items-stretch">
            
      <div class="col-md-8" data-aos="fade-up">
        <img class="img-fluid" src="shoes_img/<?php echo $shoes_img;?>">
      </div>

      <div class="col-md-3 ml-auto" data-aos="fade-up" data-aos-delay="100">
        <div class="sticky-content">
        <h3 class="h3">Brand ID <?php echo $shoes_id;?></h3>
          <h3 class="h3">Product ID <?php echo $product_id;?></h3>
            <p class="mb-4">
              <span class="text-muted">
              <b><?php echo $brand;?></b>  
              <br>
              <?php echo $shoes_types;?>
              </span>
            </p>
                    
        <div class="mb-5">
              <p>
                <i>100% authentic of <b><?php echo $brand;?></b> shoes and quality guaranteed!</i>
              </p>
        </div>

        <h4 class="h4 mb-3">Details</h4>
          <ul class="list-unstyled list-line mb-5">
              <li>Shoes Colour   :  <?php echo $colours?></li>
              <li>Shoes Size   :  <?php echo $shoes_size;?></li>
              <li>Quantity   :  <?php echo $quantity;?></li>
              <li>Price   :  <?php echo $price;?></li>  
          </ul>
            <p>
              <a href="shoesEdit.php?product_id=<?php echo $product_id?>" class="readmore" id="<?php echo $product_id;?>">Edit</a>
            </p>      
            <form action=deleteitem.php method="POST">
              <input type="hidden" value="<?php echo $product_id?>" name="product_id">  
              <input type="submit" class="readmore" name="deleteitem" value="delete" >
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

            
</main>

<footer class="footer" role="contentinfo">
    <div class="container">
      
      <div class="row">
          <div class="col-sm-6">
            <p class="mb-1">&copy; Copyright MyPortfolio. All Rights Reserved</p>
              <div class="credits">
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
          </div>

          <div class="col-sm-6 social text-md-right">
            <a href="#"><span class="icofont-twitter"></span></a>
            <a href="#"><span class="icofont-facebook"></span></a>
            <a href="#"><span class="icofont-dribbble"></span></a>
            <a href="#"><span class="icofont-behance"></span></a>
          </div>      
      </div>
    </div>
</footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>