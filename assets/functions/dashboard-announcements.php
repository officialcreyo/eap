<?php
$sql = "SELECT * FROM announcements WHERE deleted='0' ORDER BY date DESC, time DESC LIMIT 6";
$result = mysqli_query($conn, $sql);

$i=0;

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        $date=$row["date"];
        $newdate = date('M jS Y', strtotime($date));
        $time=$row["time"];
        $author=$row['author'];
        $datapath=$row['datapath'];
        $excerp=$row['excerp'];
        $excerp = nl2br($excerp);
        
        $query = "SELECT * FROM member WHERE mem_id=$author";
        $result1 = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_assoc($result1);
        
        if (strlen($excerp) > 200) {

            // truncate string
            $stringCut = substr($excerp, 0, 200);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $excerp = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            $excerp .= '... <br><a href="https://app.teamprismatic.com/app/?page=announcements">Read More</a>';
        }
        
        if ($row1['deleted'] == 1) 
        {
            $deleteuserid = $row1['deletedby'];
    
            if($deleteuserid == 0) { $nickname = "ServerQuery"; $role = ""; } else {
            
                $query = "SELECT * FROM member WHERE mem_id=$deleteuserid";
                $result2 = mysqli_query($conn, $query);
                $row2 = mysqli_fetch_assoc($result2);

                if($row2['role'] == 0) {
                    $role = " User";
                } else if($row2['role'] == 1) {
                    $role = " Moderator";
                } else if($row2['role'] == 5) {
                    $role = " Superadmin";
                }
                $nickname = $row2['nickname'];
            
            }
            $userstatus = "<span title='This user was suspended by".$role." ".$nickname.".' class='badge badge-danger'>Suspended</span>"; 
        } 
        else { $userstatus = ""; }
        
        echo "<ol>";
        echo "<div>";
        if($i > 0) { echo "<hr>"; } else {}
        echo "<img class='user-avatar rounded-circle float-left' width=40 style='display: block;' src='".$row1['avatar']."' alt='User Avatar'>";
        echo "<div>";
        echo "<a href='$url/app/?page=profiles&id=".$row['author']."' style='color: #0095eb !important; font-weight: bold; margin-left: 0.5%;'>".$row1['firstname']." '".$row1['nickname']."' ".$row1['lastname']."</a> ".$userstatus."";
        echo "<div class='small text-muted' style='display: block; margin-left: 1%'>".$row['title']." - ".$newdate." at ".$time." CEST</div>";
        echo "<div>";
        echo "<p style='color: black !important; margin-top: 1%;'>".$excerp."</p>";
        if(!empty($datapath)) { echo "<div class='small'><span>Attached file: </span><a href='$datapath' target='_blank'>".$row['filename']."</a></div>"; }
        echo "</div>";
        echo "</ol>";
        $i++;

    }
} else {
    echo "<span>No announcements.</span>";
}
?>