
<?php
//delete品牌的地方
include('config.php');

if(isset($_POST['deletebrand'])){
    $shoes_id=$_POST['shoes_id'];
    $sql = "DELETE FROM category WHERE shoes_id='".$shoes_id."'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header('location: displayitem.php');
}


?>
