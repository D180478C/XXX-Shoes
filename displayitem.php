<?php

include('config.php');
//显示全部品牌名单的地方
if(isset($_POST['submit'])){ 	

    $shoes_id=$_POST['shoes_id'];

	$brand=$_POST['brand'];


}


if(isset($_POST['submit'])){ 	

    $shoes_id=$_POST['shoes_id'];
	$brand=$_POST['brand'];

    
  $sql="update product set shoes_id='$shoes_id', brand='$brand' where shoes_id='shoes_id'";
  
  }

$sql = "SELECT shoes_id,brand FROM category"; 
$result = $conn->query($sql);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Branding List</h1>
     </div>
</section>

<nav class="navbar navbar-light custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="home.php"> << Back </a>

      <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
        <span></span>
      </a>

    </div>
  </nav>

<br>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        
                            <th scope="col">Brand ID</th>
                            <th scope="col">Brand</th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
             
                              $shoes_id=$row['shoes_id']; //add this variable
                              $brand=$row['brand'];                 
                              
                    ?>
                        <tr>
                        
                     
                            <td><?php echo $shoes_id;?></td>

                            <td><?php echo $brand;?></td>

                            <td class="readmore"><a href="brandEdit.php?shoes_id=<?php echo $shoes_id?>" class="readmore" id="<?php echo $shoes_id;?>">Edit</a> </td> 

                            <td>
                                <form action=brandDelete.php method="POST">
                                <input type="hidden" value="<?php echo $shoes_id?>" name="shoes_id">  
                                <input type="submit" class="readmore" name="deletebrand" value="delete" >
                                </form>
                            </td>

                        </tr>
                       
                     <?php

                            }
                        }
                     ?>   
                       
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</div>

