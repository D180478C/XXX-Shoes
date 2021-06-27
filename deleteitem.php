<?php
//删除产品的地方
include('config.php');

if(isset($_POST['deleteitem'])){
    $product_id=$_POST['product_id'];
    $sql = "DELETE FROM product WHERE product_id='".$product_id."'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header('location: fullList.php');
}


?>

