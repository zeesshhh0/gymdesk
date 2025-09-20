<?php

require '../dbcon.php';

$service_id = $_GET['service_id'];
$month = $_GET['month'];

$sql = "SELECT amount,plan_id FROM plans WHERE service_id='$service_id' AND duration_months='$month'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = array('amount' => $row['amount'], 'plan_id' => $row['plan_id']);
    echo json_encode($data);
} else {
    echo json_encode(array('amount' => 0));
}
