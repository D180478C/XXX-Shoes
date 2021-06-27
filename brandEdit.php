<?php
include('config.php');
//修改产品的地方

if(isset($_POST["insert"])){   
    
    $shoes_id=$_POST['shoes_id'];
    $brand=$_POST['brand'];
    
    $sql="UPDATE category SET shoes_id='$shoes_id', brand='$brand' WHERE shoes_id = '$shoes_id'";
    
    $result=$conn->query($sql);
    $conn->close();
    header("location: displayitem.php");
}

if(isset($_GET['shoes_id'])){

	$shoes_id=$_GET['shoes_id'];

    $sql="SELECT * FROM category
    WHERE shoes_id = '".$shoes_id."'";
  $result=$conn->query($sql);
      
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $brand=$row['brand'];
      
}

?>
<html>
<head>
  <title>Brand Registration</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<article class="card-body mx-auto" style="max-width: 400px;">
<h4 class="card-title mt-3 text-center"> Update Brand</h4>		

  <nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="displayitem.php"> << Back </a>
      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>
    </div>
  </nav>

    <form action="brandEdit.php" method="POST" enctype="multipart/form-data">

    
    <div class="form-group input-group">
    	  <div class="input-group-prepend">
		      <span class="input-group-text"> <img src="assets/img/productidicon.png" alt="Image"  width="40" height=40></i> </span>
        </div>
          <input type="hidden" name="shoes_id" class="form-control" value="<?php echo $shoes_id?>">
		      <input class="form-control" value="<?php echo $shoes_id?>" disabled>
	    </div>


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <img src="assets/img/brandicon.png" alt="Image"  width="40" height=40></i> </span>
		</div>

		<input name="brand" class="form-control" placeholder="Enter the Shoes Name" type="text" value="<?php echo $brand?>">
		</input>
	</div> <!-- form-group end.// -->

 
    <div class="form-group">
    <input type="submit" value="insert" name="insert">
    </div> <!-- form-group// -->      
   
                       

    </form>
    </article>
    <?php
              }
            }
    ?>
  