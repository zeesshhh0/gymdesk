<?php session_start();
include('dbcon.php'); 


if (!isset($_SESSION['user_id'])) {
  header('location: user/index.php');
}

