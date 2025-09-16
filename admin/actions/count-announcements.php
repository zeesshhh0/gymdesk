<?php

include('../../dbcon.php');

$sql = "SELECT * FROM announcements";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>