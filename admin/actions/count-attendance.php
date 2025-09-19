<?php

$sql = "SELECT * FROM attendance";
$query = $con->query($sql);

echo "$query->num_rows";