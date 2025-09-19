<?php


$sql = "SELECT SUM(p.amount) as total
            FROM subscriptions s 
            JOIN plans p ON s.plan_id = p.plan_id";
$amountsum = mysqli_query($con, $sql);
$row_amountsum = mysqli_fetch_assoc($amountsum);
echo $row_amountsum['total'];