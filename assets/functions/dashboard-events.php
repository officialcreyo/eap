<?php
$sql = "SELECT * FROM events WHERE deleted='0' AND finished='0' ORDER BY date";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        $date=$row["date"];
        $todate=$row["todate"];
        $newdate = date('M jS Y', strtotime($date));
        $newtodate = date('M jS Y', strtotime($todate));
        $startdate = new DateTime($date);
        $enddate = new DateTime($todate);

        $now = new DateTime();

        if($now > $enddate) { continue; }

        if($startdate <= $now && $now <= $enddate) { $liveenable="<span class='livespan' ><span class='livedot'></span> <span>Live</span></span>"; } else { $liveenable="<span></span>"; }

        echo "<div>
        <img src='" . $row["logo"]. "' style='width: 40px; float: left; display: block;'>
        <div style='display:block; overflow: hidden;'>
        <span style='margin-left: 10px; font-weight: bold; float: left;'>" . $row["name"]. "</span>
        <br>
        <p style='margin-left: 10px;'>" . $newdate." - " . $newtodate. "". $liveenable."</p>
        </div>
        </div>";

    }
} else {
    echo "<span>No upcoming Events.</span>";
}
?>