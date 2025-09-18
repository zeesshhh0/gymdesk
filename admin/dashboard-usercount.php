<?php

$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";

$con=mysqli_connect($servername,$uname,$pass,$db);

if(!$con){
    die("Connection Failed");
}

$sql = "SELECT * FROM members";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>