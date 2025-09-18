<?php

include('../../dbcon.php');

$sql = "SELECT SUM( (curr_weight - ini_weight) / ini_weight * 100) FROM members WHERE user_id='$id'";
$amountsum = mysqli_query($con, $sql) or die(mysqli_error($con));
$row_amountsum = mysqli_fetch_assoc($amountsum);
$totalRows_amountsum = mysqli_num_rows($amountsum);
echo (int) $row_amountsum['SUM( (curr_weight - ini_weight) / ini_weight * 100)'];


?>