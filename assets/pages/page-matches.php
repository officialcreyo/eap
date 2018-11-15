<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Matches</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Overview</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Upcoming Matches</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result='0'";
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
                                
                                if(strcmp($teamid1, "team-prismatic") == 0) { $team1 = "Team Prismatic"; } else {
                                    
                                    $query = "SELECT * FROM teams WHERE identifier='$teamid1'";

                                    $result1 = mysqli_query($conn, $query);
                                    $row1 = mysqli_fetch_array($result1);

                                    $team1 = $row1['name'];
                                }
                                
                                $query = "SELECT * FROM teams WHERE identifier='$teamid2'";

                                $result1 = mysqli_query($conn, $query);
                                $row1 = mysqli_fetch_array($result1);

                                $team2 = $row1['name'];
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge badge-info' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$team1."</span><span> vs. </span><span style='font-weight: bold;'>".$team2."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No upcoming matches.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Latest Matches</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' ORDER BY date DESC LIMIT 5";
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
                                
                                if(strcmp($teamid1, "team-prismatic") == 0) { $team1 = "Team Prismatic"; } else {
                                    
                                    $query = "SELECT * FROM teams WHERE identifier='$teamid1'";

                                    $result1 = mysqli_query($conn, $query);
                                    $row1 = mysqli_fetch_array($result1);

                                    $team1 = $row1['name'];
                                }
                                
                                $query = "SELECT * FROM teams WHERE identifier='$teamid2'";

                                $result1 = mysqli_query($conn, $query);
                                $row1 = mysqli_fetch_array($result1);

                                $team2 = $row1['name'];
                                
                                if(empty($team2)) { $team2 = $row['team2']; } else {}
                                if(empty($team1)) { $team1 = $row['team1']; } else {}
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$team1."</span><span> vs. </span><span style='font-weight: bold;'>".$team2."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No upcoming matches.</span>";
                        }
                    ?>
                <span class="float-right"><a href="./?page=matches-all"><i class="fa fa-gamepad"></i> Watch all matches</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
