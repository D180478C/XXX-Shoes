<?php
include('config.php');
//收索产品名字的地方

$shoes_name=$_POST['shoes_name'];

if($shoes_name){
    $str_where="where shoes_name LIKE '%".$shoes_name."%'";
}else{
    $shoes_name="";
    $str_where="";
}

$sql= "SELECT * FROM product ".$str_where;
$result=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product List</title>
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
      <a class="navbar-brand" href="index.html">Product List.</a>
      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>
    </div>
  </nav>

  <nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="fullList.php"> << Back </a>

   
        <span></span>
      </a>

    </div>
  </nav>

  <main id="main">

  <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-5">
            <h3 class="h3 heading">Search Result</h3>
            <p>Click the image below to get more product info.</p>
          </div>
        </div>
      
          <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
                 <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){

                            $shoes_img=$row['shoes_img'];
                            $shoes_name=$row['shoes_name'];
                            $product_id=$row['product_id'];
                            ?>
                          <a href="shoesDetail.php?product_id=<?php echo $product_id?>" class="item-wrap fancybox mb-2">
                            <div class="work-info">
                              <h3>Click for</h3>
                                <span>Details</span>
                            </div>
                              <img class="img-fluid" src="shoes_img/<?php echo $shoes_img;?>">
                              <p style="font-size:3em"><?php echo $shoes_name?></p> 
                          </a>
                        <?php
                          }
                        }
                    ?>
                    </div>
                 
    </form>
    </div>
    </section>

