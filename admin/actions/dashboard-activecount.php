<?php

require __DIR__ . '/../../dbcon.php';

$is_active_query = "SELECT COUNT(*) AS active_subscriptions FROM subscriptions WHERE DATE(start_date) <= CURDATE() AND DATE(end_date) >= CURDATE()";

$query = $con->query($is_active_query);

$result = mysqli_fetch_array($query);

echo $result['active_subscriptions'];
?>