<?php 

include('config.php');
//修改产品资料的地方

if(isset($_POST["insert"])){   
    
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

    $sql="UPDATE product set category_id='$category_id', shoes_img='$shoes_img', shoes_name='$shoes_name', shoes_types='$shoes_types', shoes_size='$shoes_size', colours='$colours', quantity='$quantity', price='$price' WHERE product_id = '$product_id'";

    $result=$conn->query($sql);

    $conn->close();
    header("location: fullList.php");
}

if(isset($_GET['product_id'])){

	$product_id=$_GET['product_id'];

    $sql="SELECT * FROM product
    left join category
    on product.category_id = category.shoes_id
    WHERE product_id = '".$product_id."'";
  $result=$conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $category_id=$row['category_id'];
        $product_id=$row['product_id'];
        $shoes_img=$row['shoes_img'];  
        $shoes_name=$row['shoes_name'];
        $shoes_types=$row['shoes_types'];                      
        $shoes_size=$row['shoes_size'];
        $colours=$row['colours'];
        $quantity=$row['quantity'];                 
        $price=$row['price'];
}
?>

<style>

.type{
  border : 1px solid #D3D3D3 ;
  height : 4px;
  
}

</style>

<html>
<head>
  <title>Shoes Update</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

<body>
<article class="card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center">Update Product</h4>		
    <form action="shoesEdit.php" method="POST" enctype="multipart/form-data">

    <div>
      <nav class="navbar navbar-light custom-navbar">
        <div class="container">
          <a class="navbar-brand" href="fullList.php"> << Back </a>
          <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>
      </nav>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/brandicon.png" alt="Image"  width="40" height=40> </span>
		  </div>
        <select name="category_id" value="<?php echo $category_id?>"> 
                <?php
                    $sql = "SELECT * FROM category";
                    $result=$conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                ?>
		      <option value="<?php echo $row['shoes_id'] ?>"><?php echo $row['brand']; ?></option>
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
     <input name="product_id" class="form-control" placeholder="Default" type="text" id="product_id" value="<?php echo $product_id?>">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/pictureicon.png" alt="Image"  width="40" height=40> </span>
		 </div>
        <input name="shoes_img" class="form-control" placeholder="shoes_img" type="file" id="shoes_img" value="<?php echo $shoes_img?>">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/name.png" alt="Image"  width="40" height=40> </span>
		</div>
		<input name="shoes_name" class="form-control" placeholder="Product name" type="text" value="<?php echo $shoes_name?>">
		</input>
	</div>

  <div class="form-group input-group">
  <div class="input-group-prepend">
  <span class="input-group-text"> <img src="assets/img/type.png" alt="Image"  width="40" height=40 ></span>
  <div class = type>
	  <select name="shoes_types"  value="<?php echo $shoes_types?>"> 
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
        <input class="form-control" name="shoes_size" placeholder="The size of product" type="text"  value="<?php echo $shoes_size?>">
    </div>                                  
    <div class="form-group">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/size.png" alt="Image"  width="40" height=40> </span>
		</div>
    <input class="form-control" name="colours" placeholder="The colours of product" type="text"  value="<?php echo $colours?>">
    </div>                                  
    <div class="form-group">

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/quantity.png" alt="Image"  width="40" height=40> </span>
		</div>
    	<input name="quantity" class="form-control" placeholder="The Quantity of product" type="number"  value="<?php echo $quantity?>">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/price.png" alt="Image"  width="40" height=40> </span>
		</div>
        <input class="form-control" name="price" placeholder="The price of product" type="text"  value="<?php echo $price?>">
    </div>                                 
    
    <div class="form-group">
    <input type="submit" value="insert" name="insert">
    </div>   
    
    </form>
    </article>
        <?php
                  }
                }
        ?>
  </body>
</html>