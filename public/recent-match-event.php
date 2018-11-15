<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PAPi Live-Panel</title>
    <meta name="description" content="PAPi - Prismatic Admin Panel (improved)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/OwlCarousel2/OwlCarousel2/develop/dist/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/match-event.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700|Open+Sans|Poppins:400,500,700" rel="stylesheet">
</head>
<body>
<div class="row no-pc">
    <div class="col-sm-7" style="background-color: #fff; color: #000; padding: 5% 10% 5% 10%;"><h2 style="font-size:18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;">Latest Scores</h2></div>
    <div class="col-sm-7" style="background-color: #f9f9f9; color: #000; padding: 10% 5% 2% 5%; min-height: 400px;">
                    <?php

                    $gameid = $_GET["game"];

                    $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

                    if(!empty($gameid)) {
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result!='0' AND game=$gameid ORDER BY date DESC, time DESC LIMIT 3";
                    }
                    else {
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result!='0' ORDER BY date DESC, time DESC LIMIT 3";
                    }
                    $result = mysqli_query($conn, $sql);

                    ?>
                    <div id="owl-demo" class="owl-carousel owl-theme">
                            <?php
                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) {

                                        $date=$row["date"];
                                        $newdate = date('M jS', strtotime($date));

                                        $today=date('Y-m-d');

                                        $teamid1 = $row['team1'];
                                        $teamid2 = $row['team2'];

                                        $query = "SELECT * FROM teams WHERE identifier='$teamid1'";

                                        $result1 = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($result1);

                                        if(!empty($row1['logo'])){ $team1logo = $row1['logo']; } else { $team1logo = $row['team1logo']; }
                                        if(strcmp($teamid1, "my-team") == 0) { $team1logo = "../images/logo2.png"; }

                                        $query = "SELECT * FROM teams WHERE identifier='$teamid2'";

                                        $result1 = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($result1);

                                        if(!empty($row1['logo'])){ $team2logo = $row1['logo']; } else { $team2logo = $row['team2logo']; }

                                        if($row["game"] == 1) {
                                            $game="CALL OF DUTY";
                                        }
                                        else if($row["game"] == 2) {
                                            $game="COUNTER-STRIKE";
                                        }
                                        else if($row["game"] == 3) {
                                            $game="LEAGUE OF LEGENDS";
                                        }
                                        else if($row["game"] == 4) {
                                            $game="FIFA";
                                        }
                                        else if($row["game"] == 5) {
                                            $game="RAINBOW SIX";
                                        }
                                        else if($row["game"] == 6) {
                                            $game="GEARS";
                                        }

                                        echo "<div class='item'>";
                                        ?>
                                        <div id="top">
                                            <h3 style="text-align: center; font-weight: semi-bold; font-size: 1.4rem; font-family: 'Cairo', Arial, Tahoma, sans-serif;"><?php echo $row['league']; ?></h3>
                                            <p style="text-align: center; color: #fff !important; font-family: 'Cairo', Arial, Tahoma, sans-serif;"><?php echo $game; ?></p>
                                        </div>
                                        <?php
                                        echo "<table style='margin-top: 5%;'>";
                                        echo "<tbody>";
                                        echo "<br>";
                                        echo "<tr>";
                                        echo "<td style='text-align: right; width: 10%;'><img style='width: 80px; display: inline-block; margin-right: 20px;' src='".$team1logo ."' alt='".$row['team1'] ."'></td>";
                                        echo "<td style='text-align: right; width: 3%; font-size: 35px; font-family: Poppins-Regular, sans-serif;'>".$row['score1'] ."</td>";
                                        echo "<td style='text-align: center; width: 3%; color: #576272; font-weight: bold;'>vs</td>";
                                        echo "<td style='text-align: left; width: 3%; font-size: 35px; font-family: Poppins-Regular, sans-serif;'>".$row['score2'] ."</td>";
                                        echo "<td style='text-align: left; width: 10%;'><img style='width: 100px; display: inline-block; margin-left: 20px;' src='".$team2logo ."' alt='".$row['team2'] ."'></td>";
                                        echo "</tr>";
                                        echo "</table>";
                                        echo "</tbody>";
                                        echo "</div>";
                                    }
                            } else {
                                echo "<p style='color: #fff; font-size: 18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;'>No upcoming Matches.</p>";
                            }
                        ?>
        </div>
    </div>
    <div class="w-sm-100"></div>
    <div class="col-sm-5" style="background-color: #05607f; color: #eee; padding: 5% 10% 5% 10%;"><h2 style="font-size:18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;">Recent Events</h2></div>
    <div class="col-sm-5" style="background-color: #0a3d58; color: #fff; padding: 5% 5% 2% 10%; min-height: 400px;">
    <?php
        $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

        $gameid = $_GET["game"];

        $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

        if(!empty($gameid)) {
            $sql = "SELECT * FROM events WHERE deleted='0' AND display='1' AND game=$gameid ORDER BY date LIMIT 5";
        }
        else {
            $sql = "SELECT * FROM events WHERE deleted='0' AND display='1' ORDER BY date LIMIT 5";
        }
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

                if($startdate <= $now && $now <= $enddate) { $liveenable="<span><span class='livedot' style='margin-left: 10px;'></span> <span style='font-size: 11px; font-weight: 600; font-family: 'Open Sans', sans-serif;'>ONGOING</span></span>"; } else { $liveenable="<span></span>"; }

                echo "<div style='margin-bottom: 15px;'><img src='" . $row["logo"]. "' style='width: 50px; float: left; display: block; margin-right: 2%;'><div style='display:block; overflow: hidden #ddd; margin-left: 10px; font-weight: bold;'>" . $row["name"]. "<p style='color: #ddd; margin-left: 10px; font-family: 'Open Sans', sans-serif;'>" . $newdate." - " . $newtodate. "". $liveenable."</p></div></div>";

            }
        } else {
            echo "<br>No upcoming Events.";
        }
    ?>
    </div>
</div>
<div class="row no-mobile">
    <div class="col-sm-7" style="background-color: #fff; color: #000; padding: 1.5% 5% 1.5% 5%;"><h2 style="font-size:18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;">Latest Scores</h2></div>
    <div class="col-sm-5" style="background-color: #05607f; color: #eee; padding: 1.5% 5% 1.5% 5%;"><h2 style="font-size:18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;">Recent Events</h2></div>

    <div class="w-xs-100"></div>

    <div class="col-sm-7" style="background-color: #f9f9f9; color: #000; padding: 2% 5% 2% 5%; min-height: 400px;">
                    <?php

                    $gameid = $_GET["game"];

					$conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

                    if(!empty($gameid)) {
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result!='0' AND game=$gameid ORDER BY date DESC, time DESC LIMIT 3";
                    }
                    else {
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result!='0' ORDER BY date DESC, time DESC LIMIT 3";
                    }
                    $result = mysqli_query($conn, $sql);

                    ?>
                    <div id="owl-demo1" class="owl-carousel owl-theme">
                            <?php
                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) {

                                        $date=$row["date"];
                                        $newdate = date('M jS', strtotime($date));

                                        $today=date('Y-m-d');

                                        $teamid1 = $row['team1'];
                                        $teamid2 = $row['team2'];

                                        $query = "SELECT * FROM teams WHERE identifier='$teamid1'";

                                        $result1 = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($result1);

                                        if(!empty($row1['logo'])){ $team1logo = $row1['logo']; } else { $team1logo = $row['team1logo']; }
                                        if(strcmp($teamid1, "my-team") == 0) { $team1logo = "../images/logo2.png"; }

                                        $query = "SELECT * FROM teams WHERE identifier='$teamid2'";

                                        $result1 = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($result1);

                                        if(!empty($row1['logo'])){ $team2logo = $row1['logo']; } else { $team2logo = $row['team2logo']; }

                                        if($row["game"] == 1) {
                                            $game="CALL OF DUTY";
                                        }
                                        else if($row["game"] == 2) {
                                            $game="COUNTER-STRIKE";
                                        }
                                        else if($row["game"] == 3) {
                                            $game="LEAGUE OF LEGENDS";
                                        }
                                        else if($row["game"] == 4) {
                                            $game="FIFA";
                                        }
                                        else if($row["game"] == 5) {
                                            $game="RAINBOW SIX";
                                        }
                                        else if($row["game"] == 6) {
                                            $game="GEARS";
                                        }
                                        echo "<div class='item'>";
                                        ?>
                                        <div id="top">
                                            <h3 style="text-align: center; font-weight: semi-bold; font-size: 1.4rem; font-family: 'Cairo', Arial, Tahoma, sans-serif;"><?php echo $row['league']; ?></h3>
                                            <p style="text-align: center; color: #fff !important; font-family: 'Cairo', Arial, Tahoma, sans-serif;"><?php echo $game; ?></p>
                                        </div>
                                        <?php
                                        echo "<table style='margin-top: 5%;'>";
                                        echo "<tbody>";
                                        echo "<br>";
                                        echo "<tr>";
                                        echo "<td style='text-align: right; width: 10%;'><img style='width: 80px; display: inline-block; margin-right: 20px;' src='".$team1logo ."' alt='".$row['team1'] ."'></td>";
                                        echo "<td style='text-align: right; width: 3%; font-size: 35px; font-family: Poppins-Regular, sans-serif;'>".$row['score1'] ."</td>";
                                        echo "<td style='text-align: center; width: 3%; color: #576272; font-weight: bold;'>vs</td>";
                                        echo "<td style='text-align: left; width: 3%; font-size: 35px; font-family: Poppins-Regular, sans-serif;'>".$row['score2'] ."</td>";
                                        echo "<td style='text-align: left; width: 10%;'><img style='width: 100px; display: inline-block; margin-left: 20px;' src='".$team2logo ."' alt='".$row['team2'] ."'></td>";
                                        echo "</tr>";
                                        echo "</table>";
                                        echo "</tbody>";
                                        echo "</div>";
                                    }
                            } else {
                                echo "<p style='color: #fff; font-size: 18px; font-family: 'Cairo', Arial, Tahoma, sans-serif; font-weight: 400;'>No upcoming Matches.</p>";
                            }
                        ?>
        </div>
    </div>
    <div class="col-sm-5" style="background-color: #0a3d58; color: #fff; padding: 2% 5% 2% 5%; min-height: 400px;">
    <?php
        $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

        $gameid = $_GET["game"];

        $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");

        if(!empty($gameid)) {
            $sql = "SELECT * FROM events WHERE deleted='0' AND display='1' AND game=$gameid ORDER BY date LIMIT 5";
        }
        else {
            $sql = "SELECT * FROM events WHERE deleted='0' AND display='1' ORDER BY date LIMIT 5";
        }
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

                if($startdate <= $now && $now <= $enddate) { $liveenable="<span><span class='livedot' style='margin-left: 10px;'></span> <span style='font-size: 11px; font-weight: 600; font-family: 'Open Sans', sans-serif;'>ONGOING</span></span>"; } else { $liveenable="<span></span>"; }

                echo "<div style='margin-bottom: 15px;'><img src='" . $row["logo"]. "' style='width: 50px; float: left; display: block; margin-right: 2%;'><div style='display:block; overflow: hidden #ddd; margin-left: 10px; font-weight: bold;'>" . $row["name"]. "<p style='color: #ddd; margin-left: 10px; font-family: 'Open Sans', sans-serif;'>" . $newdate." - " . $newtodate. "". $liveenable."</p></div></div>";

            }
        } else {
            echo "<br>No upcoming Events.";
        }
    ?>
    </div>
</div>
<script>
$(document).ready(function() {

    $("#owl-demo").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        autoplay: true,
        paginationSpeed : 400,
        singleItem:true,
        autoWith: true,
        loop: true,
        items : 1
    });

});
</script>
<script>
$(document).ready(function() {

    $("#owl-demo1").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        autoplay: true,
        paginationSpeed : 400,
        singleItem:true,
        autoWith: true,
        loop: true,
        items : 1
    });

});
</script>
</body>
</html>
