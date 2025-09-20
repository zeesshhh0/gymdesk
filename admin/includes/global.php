<?php

require_once '../dbcon.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

if (!isset($_SESSION['admin_id'])) {
  header('location: login.php');
}