<?php 

include('config.php');
//添加品牌的地方

if(isset($_POST['submit'])){
	
	$brand=$_POST['brand'];

	$sql="INSERT INTO category(shoes_id, brand) VALUES ('','$brand')";
  $result=$conn->query($sql);
  header("location: home.php");

	//step 7 
	$conn->close();
}

?>

<html>
<head>
  <title>Insert New Brand</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>	
<style>

.main{

  padding-left: 600px;
  
}
</style>
<nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="home.php"> << Back </a>

      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>

    </div>
  </nav>

  <h4 class="card-title mt-3 text-center">Insert New Brand </h4>	
    <form action="insertitem.php" method="POST">
    <div>

	<div class="card-title mt-3 text-center">
  <br> Insert New Brand: <input type="text" name="brand" />
    
    <input type="submit" value="Register" name="submit">
      <br />
      </div>
    </form>
    
</body>
</html>