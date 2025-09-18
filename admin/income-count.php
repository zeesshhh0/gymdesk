<?php

$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";

$con=mysqli_connect($servername,$uname,$pass,$db);

if(!$con){
    die("Connection Failed");
}

$sql = "SELECT SUM( amount) FROM members";
        $amountsum = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( amount)'];
?>