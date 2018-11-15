<?php

$result = mysqli_query($conn, "SELECT * FROM matches WHERE deleted='0' AND result='0'");
$result2 = mysqli_query($conn, "SELECT * FROM matches WHERE deleted='0' AND result!='0'");
$result3 = mysqli_query($conn, "SELECT * FROM events WHERE deleted='0' AND finished='0'");
$result4 = mysqli_query($conn, "SELECT * FROM events WHERE deleted='0' AND finished='1'");

$num_rows = mysqli_num_rows($result);
$num_rows2 = mysqli_num_rows($result2);
$num_rows3 = mysqli_num_rows($result3);
$num_rows4 = mysqli_num_rows($result4);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    
    }
} else {
    echo "";
}

include ('../assets/functions/twitter-include.php');
include ('../assets/functions/facebook-include.php');

include ('../assets/cronjobs/twitter-stats-cron.php');

//Berechnung der Follower Differenz ===============================

$statistic_date = date('Y-m-d', strtotime('-7 days'));
$query = mysqli_query($conn, "SELECT * FROM stats_twitter WHERE date='$statistic_date'");
$row = mysqli_fetch_array($query);
$old_follower = $row['follower'];
$old_tweet_count = $row['tweets'];

$follower_difference = $followers - $old_follower;
$tweet_difference = $statuses1 - $old_tweet_count;

if($follower_difference > 0) {
    $differencesymbol = "+";
    $differencecolor = "green";
    
} else if ($follower_difference == 0) {
    $differencesymbol = "+/-";
    $differencecolor = "#0095eb";
} else if ($follower_difference < 0) {
    $differencecolor = "red";
    $differencesymbol = "";
}

//==================================================================

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <?php //include ('../assets/functions/welcome-message.php'); ?>
    <div class="col-lg-3 col-md-6">
        <div class="social-box twitter">
            <i class="fa fa-twitter"></i>
            <ul>
                <li>
                    <strong><span class="count"><?php echo $followers; ?></span> <span style="color:<?php echo $differencecolor; ?>"><?php echo $differencesymbol; ?></span><span class="count" style="color:<?php echo $differencecolor; ?>"> <?php echo $follower_difference; ?></span></strong>
                    <span>Follower</span>
                </li>
                <li>
                    <strong><span class="count"><?php echo $statuses1; ?></span> <span style="color:<?php echo $differencecolor; ?>"><?php echo $differencesymbol; ?></span><span class="count" style="color:<?php echo $differencecolor; ?>"> <?php echo $tweet_difference; ?></span></strong>
                    <span>Tweets</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->
    <div class="col-lg-3 col-md-6">
        <div class="social-box facebook">
            <i class="fa fa-facebook"></i>
            <ul>
                <li>
                    <strong><span class="count"><?php echo $facebooklikes ?></span></strong>
                    <span>Likes</span>
                </li>
                <li>
                    <strong><span class="count"><?php echo $facebooknewlikes ?></span></strong>
                    <span>Recent likes</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->
    <div class="col-lg-3 col-md-6">
        <div class="social-box linkedin">
            <i class="fa fa-gamepad"></i>
            <ul>
                <li>
                    <strong><span class="count"><?php echo $num_rows; ?></span></strong>
                    <span>Pending</span>
                </li>
                <li>
                    <strong><span class="count"><?php echo $num_rows2; ?></span></strong>
                    <span>Completed</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->
    <div class="col-lg-3 col-md-6">
        <div class="social-box google-plus">
            <i class="fa fa-calendar"></i>
            <ul>
                <li>
                    <strong><span class="count"><?php echo $num_rows3; ?></span></strong>
                    <span>Pending</span>
                </li>
                <li>
                    <strong><span class="count"><?php echo $num_rows4; ?></span></strong>
                    <span>Completed</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->
    <div class="col-xl-6 float-left">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Upcoming Matches</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php include ('../assets/functions/dashboard-matches.php'); ?>  
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 float-right">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Upcoming Events</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php include ('../assets/functions/dashboard-events.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
