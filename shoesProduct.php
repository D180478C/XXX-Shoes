<?php

include("config.php");
//添加产品的地方
//category id的选择会根据category table里面的shoes id选择

if(isset($_POST["insert"])){   
    $category_id=$_POST['category_id'];
    $shoes_types=$_POST['shoes_types'];
    $shoes_size=$_POST['shoes_size'];
    $colours=$_POST['colours'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $shoes_name=$_POST['shoes_name'];
    $shoes_img = $shoes_name.'.jpg';
    $target_dir = "shoes_img/";

    $target_file = $target_dir . $shoes_img;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["shoes_img"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["shoes_img"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["shoes_img"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

    $sql="INSERT INTO `product`(`category_id`, `product_id`, `shoes_img`, `shoes_name`, `shoes_types`, `shoes_size`, `colours`, `quantity`, `price`) VALUES ('$category_id','','$shoes_img','$shoes_name','$shoes_types','$shoes_size','$colours','$quantity','$price')";

    $result=$conn->query($sql);

    $conn->close();
    header("location: fullList.php");
}
?>

<style>

.type{
  border : 1px solid #D3D3D3 ;
  height : 4px;
  
}

</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<div class="container">
<div class="card bg-light">

<nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="home.php"> << Back </a>

      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>

    </div>
  </nav>

<article class="card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center">Insert Product</h4>		
	<form action="shoesProduct.php" method="POST" enctype="multipart/form-data" >
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/brandicon.png" alt="Image"  width="40" height=40> </span>
		</div>
        <select name="category_id"> 
          <?php
            $sql="SELECT * FROM category";
            $result=$conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $id=$row['shoes_id'];
                $brand=$row['brand'];
          ?>
		      <option value="<?php echo $id; ?>"><?php echo $brand;?></option>
          <?php
              }
            }
          ?>
		    </select>
    </div>

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/productidicon.png" alt="Image"  width="40" height=40> </span>
		 </div>
        <input name="product_id" class="form-control" placeholder="Product Id will be auto generated" type="text">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/pictureicon.png" alt="Image"  width="40" height=40> </span>
		 </div>
        <input name="shoes_img" class="form-control" placeholder="shoes_img" type="file" id="shoes_img">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/name.png" alt="Image"  width="40" height=40> </span>
		  </div>
		    <input name="shoes_name" class="form-control" placeholder="Name the product" type="text"></input>
	  </div>

    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <img src="assets/img/type.png" alt="Image"  width="40" height=40> </span>
          <div class = type>
            <select name="shoes_types"> 
              <option value="Running">Running</option>
              <option value="Basketball Shoes">Basketball Shoes</option>
              <option value="Gym and training">Gym and training</option>
              <option value="Sandal">Sandal and Slides</option>
              <option value="Tennis">Tennis</option>
              <option value="Lifestyle">Lifestyle</option>
            </select>
          </div>
      </div>
    </div>

          <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/size.png" alt="Image"  width="40" height=40> </span>
		</div>
        <input class="form-control" name="shoes_size" placeholder="Label the shoes size" type="text">
    </div>                                  
    <div class="form-group">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/size.png" alt="Image"  width="40" height=40> </span>
		</div>
    <input class="form-control" name="colours" placeholder="Label the colours of Product" type="text">
    </div>                                  
    <div class="form-group">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/quantity.png" alt="Image"  width="40" height=40> </span>
		</div>
		
    	<input name="quantity" class="form-control" placeholder="Enter the quantity of product" type="number">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/price.png" alt="Image"  width="40" height=40> </span>
		</div>
        <input class="form-control" name="price" placeholder="Label the price for product" type="text">
    </div>                                 
    
    <div class="form-group">
    <input type="submit" value="insert" name="insert">
    </div>   
  
</form>
</article>
</div>

</div> 

<br><br>
