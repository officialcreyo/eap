<?php

$sql = "SELECT * FROM events WHERE deleted='0' AND finished='0'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $eventid=$row["id"];
        $todate=$row["todate"];
        $enddate = new DateTime($todate);

        $now = new DateTime();

        if($now > $enddate) { 
            $sql = "UPDATE events SET finished='1' WHERE id='$eventid'";

            if ($conn->query($sql) === TRUE) {
                
            }
        }
    }
}

?>