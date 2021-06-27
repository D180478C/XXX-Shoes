<?php
include('config.php');
//显示全部产品的地方

if(isset($_POST['submit'])){ 	

  $category_id=$_POST['category_id'];
  $product_id=$_POST['product_id'];
  $shoes_size=$_POST['shoes_size'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $shoes_name=$_POST['shoes_name'];
  $shoes_img = $shoes_name.'.jpg';
  $target_dir = "shoes_img/";
  
  $conn->close();

}

$keyword = "";	

$sql="SELECT shoes_name,shoes_img FROM product".$keyword;

$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product List</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <style>
   .client-logo{
    width: 150px;
    height: 30px;
    margin:  auto;
    vertical-align: middle;
    border: 1px solid white;
    transition-duration: 0.4s;
    
   }
   .client-logo:hover {
    background-color: white; 
    
   }

   .itembox{
    padding-left: 200px;
    width: 400px;
    height: 400px;
   }
   
   .submit{
    border-radius: 12px;
    background-color: black;
    color : white;
    border: 0px solid ;
    transition-duration: 0.4s;
   }

   .submit:hover {
  background-color: #D3D3D3; 
   }
  .search{
    border-radius: 12px;
    border: 1px solid  black;
  }
  
 

  </style>
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
      <a class="navbar-brand" href="index.html">Product List.</a>
      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>
    </div>
  </nav>

  <nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="home.php"> << Back </a>
        <span></span>
      </a>
    </div>
  </nav>

  <main id="main">

    <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-5">
          <h3 class="h3 heading">Sponsored By</h3>
            <p>Stay tuned for more Branding!</p>
          </div>
        </div>
      
        <div class="row">          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/logo-adidas1.png" width="350" height="350" alt="Image" class="img-fluid" id="adidas"></a>
          </div>
          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/logo-puma.png" width="90" height="90" alt="Image" class="img-fluid" id="puma"></a>
          </div>
          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/logo-jordan.png" width="100" height="100" alt="Image" class="img-fluid" id="Jordan"></a>
          </div>
          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/logo-reebok.png" width="500" height="500" alt="Image" class="img-fluid" id="Reebok"></a>
          </div>
          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/nike-logo.png" width="150" height="150" alt="Image" class="img-fluid" id="Nike"></a>
          </div>
          
          <div class="col-4 col-sm-4 col-md-2">
            <a href="brandDisplay.php" class="client-logo"><img src="assets/img/logo-nb.png"  width="300" height="300" alt="Image" class="img-fluid" id="New Balance"></a>
          </div>
        </div>

      </div>
    </section>
    
    <section class="section site-portfolio">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
            <h2>Shop the Lastest & Clothing Fashion Today</h2>
            <p class="mb-0">"Step Up Your Style with XYZ Online Shoes Shop" </p>     
          </div>
          
          <div class="col-md-20 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
            <div id="filters" class="filters">
             <form action="searchProduct.php" method="POST"> 
                <input type="text" name="shoes_name" >
                  <button type="submit" button class = "submit">Search</button>
              </form>
              

              <p>
                          
              <?php
                $sql="SELECT * FROM category";
                
                $result=$conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $id=$row['shoes_id'];
                    $brand=$row['brand'];
              ?>
              
              <form action="brandDisplay.php?id=<?php echo $id; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button class="client-logo" type="submit"><?php echo $brand; ?></button>
              </form>
              <?php
                  }
                }
              ?>
            </div>
          </div>
        </div>

        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
          <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
           
              <?php
                 
                 $sql="select * from product";
                 
                 $result=$conn->query($sql);               
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $shoes_img=$row['shoes_img'];
                    $shoes_name=$row['shoes_name'];
                    $product_id=$row['product_id'];
                    ?>

                    <div class="itembox">
                  <a href="shoesDetail.php?product_id=<?php echo $product_id?>" class="item-wrap fancybox mb-2">
                    <div class="work-info">
                      <h3>Click for</h3>
                        <span>Details</span>
                    </div>
                      <img class="img-fluid" src="shoes_img/<?php echo $shoes_img;?>">
                      <p style="font-size:2em"><?php echo $shoes_name?></p> 
                  </div>
                   </a>
                <?php
                  }
                }
            ?>
              
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
              Designed by XYZ.</a>
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