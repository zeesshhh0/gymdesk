<?php
require 'includes/global.php';

if(isset($_GET['id'])){
$id=$_GET['id'];




$qry="UPDATE members SET reminder = '1' where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo '<script>alert("Notification sent to selected user!")</script>';
    echo '<script>window.location.href = "payment.php";</script>';
    
}else{
    echo"ERROR!!";
}
}
?>