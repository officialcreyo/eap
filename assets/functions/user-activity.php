<?php

        $date = date("Y-m-d");
        $time = date("H:i");

        $sql = "UPDATE member SET activitydate_at='$date', activitytime_at='$time' WHERE mem_id='$mem_id'";

        if ($conn->query($sql) === TRUE) {
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

?>