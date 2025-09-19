<?php
//the isset function to check username is already loged in and stored on the session
require '../includes/global.php';

$user_id = $_GET['id'];


$sql = "insert into attendance (user_id, check_in_time, recorded_by) values ('$user_id', NOW(), 'admin')";
$res = $con->query($sql) ;

header("Location: ../attendance.php");
exit();
