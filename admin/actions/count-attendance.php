<?php

include('../../dbcon.php');

$sql = "SELECT * FROM attendance";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>