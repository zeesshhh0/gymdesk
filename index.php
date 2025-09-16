<?php session_start();
include('dbcon.php'); 

if(isset($_SESSION['admin_id'])){
  header('location: admin/index.php');
  return;
}

if (isset($_SESSION['user_id'])) {
  header('location: user/pages/index.php');
  return;
} 


header('location: user/index.php');
?>