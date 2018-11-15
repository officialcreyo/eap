<?php 
	session_start();
    $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");
        
    function isDateInRange($start_date, $end_date, $date_from_user)
    {
      // Convert to timestamp
      $start_ts = strtotime($start_date);
      $end_ts = strtotime($end_date);
      $user_ts = strtotime($date_from_user);

      // Check that user date is between start & end
      return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }
?>
    <style>
    .matchfloat {
        position:fixed; 
        bottom:15%; 
        right:0;
    }
    .livedot {
        height: 5px;
        width: 5px;
        background-color: red;
        border-radius: 50%;
        display: inline-block;
        margin-bottom: 1px;
    }
    .hoverclose {
        z-index: 1;
    }
    .hoverclose:hover {
            color: #0095eb;
    }
    .notextdecolink:hover {
            text-decoration: none;
    }
    @media only screen and (max-width: 768px) {
        .donotdisplaymobile {
            display: none;
        }
    }
    </style>
    <div>
                <?php
                date_default_timezone_set("Europe/Berlin");
                $sql = "SELECT id, game, date, time, team1, team2, region1, region2, score1, score2, league, link, result, team1logo, team2logo, streamlink FROM matches WHERE deleted='0' AND result='0'";
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        $date=$row["date"];
                        $time=$row["time"];
                        $today=date('Y-m-d');                            
                        $timestamp = strtotime($time);
                        $timestamp1 = time();
                        $timeadd = $timestamp + 1800;
                        $timeend = strftime('%H:%M', $timeadd);
                        $timenow = strftime('%H:%M', $timestamp1);
                        
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
                        
                        if($date == $today && $timenow > $time && $timenow < $timeend) {
                            ?>
                            <div id="hidematch" class="col matchfloat donotdisplaymobile" style="background-color: #fff; color: #000; padding: 1% 2% 1% 1.5%; min-height: 120px; width: 400px; border-left: 5px solid #05607f; z-index: 9999; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                                <span id='close' class="hoverclose" style="display:block; text-align: right; float:right;" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>x</span>
                                <?php if(!empty($row['streamlink'])) { ?>
                                    <span class="livedot"></span><span style="font-weight: 600; z-index: 5;"> Now live</span>
                                    <br>
                                    <span style="font-weight: 600;"><?php echo $team1; ?> <span style="color: #000; font-weight: 400;">against</span> <?php echo $team2; ?></span>
                                    <br>
                                    <span style="font-size: 12px;">in <?php echo $row['league']; ?></span>
                                    <br><br>
                                    <span style="text-align: left; display:block;"><a class="notextdecolink" href="<?php echo $row['streamlink']; ?>" target="_blank">Watch now</a></span>
                                <?php } else if(!empty($row['link'])) {?>
                                    <span>Now playing:</span>
                                    <br>
                                    <span><?php echo $team1; ?> <span style="color: #aaa; font-style: italic;">against</span> <?php echo $team2; ?></span>
                                    <br>
                                    <span style="font-size: 12px;">in <?php echo $row['league']; ?></span>
                                    <br><br>
                                    <span style="text-align: left; display:block;"><a class="notextdecolink" href="<?php echo $row['link']; ?>" target="_blank">See more</a></span>
                                <?php } else {?>
                                    <span>Now playing:</span>
                                    <br>
                                    <span><?php echo $team1; ?> <span style="color: #aaa; font-style: italic;">against</span> <?php echo $team2; ?></span>
                                    <br>
                                    <span style="font-size: 12px;">in <?php echo $row['league']; ?></span>
                                <?php }?>
                            </div>
                            <?php
                            break;
                        }
                    }
                }
            ?>
    </div>