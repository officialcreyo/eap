<?php           
    $sql = "SELECT * FROM matches WHERE deleted='0' AND result='0' ORDER BY date";
    $result = mysqli_query($conn, $sql);
                    
    if (mysqli_num_rows($result) > 0) {
                        
        while($row = mysqli_fetch_assoc($result)) {
            $date = $row['date'];
            $newdate = date('M jS Y', strtotime($date));
            
            $gameid = $row['game'];

            $gamequery = "SELECT * FROM games WHERE id='$gameid'";

            $gameresult = mysqli_query($conn, $gamequery);
            $gamerow = mysqli_fetch_assoc($gameresult);

            $game = $gamerow["name"];
            
            $teamid1 = $row['team1'];
            $teamid2 = $row['team2'];              
                                    
            $query = "SELECT * FROM teams WHERE identifier='$teamid1'";

            $result1 = mysqli_query($conn, $query);
            $row1 = mysqli_fetch_array($result1);

            $team1 = $row1['name'];
                                
            $query = "SELECT * FROM teams WHERE identifier='$teamid2'";

            $result1 = mysqli_query($conn, $query);
            $row1 = mysqli_fetch_array($result1);

            $team2 = $row1['name'];
            
            echo "<ol>";
            echo "<div>";
            echo "<span class='badge badge-info' style='margin-right: 0.5%;'>$game</span>";
            echo "<span style='font-weight: bold;'>".$team1."</span><span> vs. </span><span style='font-weight: bold;'>".$team2."</span><a href='".$row['link']."'><button class='btn btn-primary' style='float:right;'>Read more</button></a>";
            echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
            echo "</div>";
            echo "</ol>";
        }
    } else {
        echo "<span>No upcoming matches.</span>";
    }
?>