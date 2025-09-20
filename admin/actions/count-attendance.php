<?php

$sql = "SELECT * FROM attendance where DATE(check_in_time)=CURDATE()";
$query = $con->query($sql);

echo "$query->num_rows";