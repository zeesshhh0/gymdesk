<?php

session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['admin_id'])){
header('location: login.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbcon.php';


$qry="delete from announcements where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:../announcement.php');
}else{
    echo"ERROR!!";
}
}
?>