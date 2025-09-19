<?php

$sql = "SELECT * FROM announcements";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>