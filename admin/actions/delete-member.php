<?php
//the isset function to check username is already loged in and stored on the session
require 'includes/global.php';

if(isset($_GET['id'])){
$id=$_GET['id'];


$qry="delete from members where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:../remove-member.php');
}else{
    echo"ERROR!!";
}
}
?>