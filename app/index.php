<?php
    session_start();
    include ('../assets/configs/mysql.php');
    include ('../assets/functions/check-user-session.php');
    require_once ('../assets/functions/getprofilcontent.php');
    include ('../assets/functions/check-user-permission.php');
    include ('../assets/configs/page.php');
    include ('../assets/cronjobs/event-refresh-cronjob.php');
    include ('../assets/functions/user-activity.php');
?>

<?php

    $sql = "SELECT * FROM tasks WHERE deleted='0' AND finished='0'";
    $result = mysqli_query($conn, $sql);

    $i = 0;

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $worker=$row['touser'];
            $deworker = json_decode($worker, true);

            foreach($deworker as $value){
                if($value == $mem_id) { $i++; }
            }
        }
        if($i > 9) { $i = "9"; $iplus = "+"; } else { $iplus = ""; }
    }

    function shortText($string,$lenght) {
        if(strlen($string) > $lenght) {
            $string = substr($string,0,$lenght)."...";
            $string_ende = strrchr($string, " ");
            $string = str_replace($string_ende," ...", $string);
        }
        return $string;
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $sitename; echo " - "; echo "$pagename"; ?></title>
    <meta name="description" content="EAP by Creyo">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    <script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../assets/js/lib/chart-js/chartjs-init.js"></script>
    
    <script src="../assets/js/image-picker.min.js"></script>
    
    <link rel="apple-touch-icon" href="../images/logo2.png">
    <link rel="shortcut icon" href="../images/logo2.png">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/select2.css">
    <link rel="stylesheet" href="../assets/css/select2-bootstrap4.css">
    <link rel="stylesheet" href="../assets/css/image-picker">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/brands.css" integrity="sha384-VGCZwiSnlHXYDojsRqeMn3IVvdzTx5JEuHgqZ3bYLCLUBV8rvihHApoA1Aso2TZA" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo "$url/app"; ?>"><img src="../images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="<?php echo "$url/app"; ?>"><img src="../images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <?php include ('../assets/functions/menu.php'); ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-align-left"></i></a>
                    <div class="header-left">

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php echo $i; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red" style="font-weight: bold;">You have <?php echo $i; echo $iplus; ?> Notification</p>
                                <?php
                                
                                $sql2 = "SELECT * FROM tasks WHERE deleted='0' AND finished='0'";
                                $result2 = mysqli_query($conn, $sql2);
                                
                                if (mysqli_num_rows($result2) > 0) {

                                    while($row2 = mysqli_fetch_assoc($result2)) {

                                        $worker=$row2['touser'];
                                        $deworker = json_decode($worker, true);

                                        foreach($deworker as $value){
                                            if($value == $mem_id) {
                                ?>
                                
                                <a class="dropdown-item media" data-toggle='modal' data-target='#taskmodal<?php echo $row2['id']; ?>'>
                                    <i class="fa fa-exclamation"></i>
                                    <p><?php echo shortText($row2['title'],  40); ?></p>
                                </a>
                                
                                <?php } } } } else { echo "<p>No notifcations.</p>"; } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="user-area dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo $mem_profilavatar; ?>" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo "$url/app/?page=profiles&id=$mem_id"; ?>"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="<?php echo "$url/app/?page=tasks"; ?>"><i class="fa fa-user"></i> Notifications <span class="count"><?php echo $i; ?></span></a>
                            <a class="nav-link" href="<?php echo "$url/app/?page=my-settings"; ?>"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="../assets/functions/do-logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        <div style="min-height: 900px;">
        <?php if(strcmp($_GET['page'], "") == 0) {
            include ('../assets/pages/page-dashboard.php');
        } else if(strcmp($_GET['page'], "matches") == 0) {
            include ('../assets/pages/page-matches.php');
        } else if(strcmp($_GET['page'], "matches-edit") == 0) {
            include ('../assets/pages/page-matches-edit.php');
        } else if(strcmp($_GET['page'], "matches-add") == 0) {
            include ('../assets/pages/page-matches-add.php');
        } else if(strcmp($_GET['page'], "matches-all") == 0) {
            include ('../assets/pages/page-matches-watch-all.php');
        } else if(strcmp($_GET['page'], "events") == 0) {
            include ('../assets/pages/page-events.php');
        } else if(strcmp($_GET['page'], "events-edit") == 0) {
            include ('../assets/pages/page-events-edit.php');
        } else if(strcmp($_GET['page'], "events-add") == 0) {
            include ('../assets/pages/page-events-add.php');
        } else if(strcmp($_GET['page'], "events-all") == 0) {
            include ('../assets/pages/page-events-watch-all.php');
        } else if(strcmp($_GET['page'], "accounts") == 0) {
            include ('../assets/pages/page-accounts.php');
        } else if(strcmp($_GET['page'], "accounts-edit") == 0) {
            include ('../assets/pages/page-accounts-edit.php');
        } else if(strcmp($_GET['page'], "social-twitter") == 0) {
            include ('../assets/pages/page-twitter.php');
        } else if(strcmp($_GET['page'], "social-facebook") == 0) {
            include ('../assets/pages/page-facebook.php');
        } else if(strcmp($_GET['page'], "invoices") == 0) {
            include ('../assets/pages/page-invoices.php');
        } else if(strcmp($_GET['page'], "invoices-add") == 0) {
            include ('../assets/pages/page-invoices-add.php');
        } else if(strcmp($_GET['page'], "filemanager") == 0) {
            include ('../assets/pages/page-filemanager.php');
        } else if(strcmp($_GET['page'], "accounts-add") == 0) {
            include ('../assets/pages/page-accounts-add.php');
        } else if(strcmp($_GET['page'], "press-releases") == 0) {
            include ('../assets/pages/page-press-releases.php');
        } else if(strcmp($_GET['page'], "press-releases-add") == 0) {
            include ('../assets/pages/page-press-releases-add.php');
        } else if(strcmp($_GET['page'], "press-releases-edit") == 0) {
            include ('../assets/pages/page-press-releases-edit.php');
        } else if(strcmp($_GET['page'], "profiles") == 0) {
            include ('../assets/pages/page-profiles.php');
        } else if(strcmp($_GET['page'], "tasks") == 0) {
            include ('../assets/pages/page-tasks.php');
        } else if(strcmp($_GET['page'], "tasks-add") == 0) {
            include ('../assets/pages/page-tasks-add.php');
        } else if(strcmp($_GET['page'], "tasks-edit") == 0) {
            include ('../assets/pages/page-tasks-edit.php');
        } else if(strcmp($_GET['page'], "announcements") == 0) {
            include ('../assets/pages/page-announcements.php');
        } else if(strcmp($_GET['page'], "announcements-add") == 0) {
            include ('../assets/pages/page-announcements-add.php');
        } else if(strcmp($_GET['page'], "announcements-edit") == 0) {
            include ('../assets/pages/page-announcements-edit.php');
        } else if(strcmp($_GET['page'], "teams") == 0) {
            include ('../assets/pages/page-teams.php');
        } else if(strcmp($_GET['page'], "teams-edit") == 0) {
            include ('../assets/pages/page-teams-edit.php');
        } else if(strcmp($_GET['page'], "teams-add") == 0) {
            include ('../assets/pages/page-teams-add.php');
        } else if(strcmp($_GET['page'], "reportings") == 0) {
            include ('../assets/pages/page-reportings.php');
        } else if(strcmp($_GET['page'], "reportings-add") == 0) {
            include ('../assets/pages/page-reportings-add.php');
        } else if(strcmp($_GET['page'], "reportings-edit") == 0) {
            include ('../assets/pages/page-reportings-edit.php');
        } else if(strcmp($_GET['page'], "financeplan") == 0) {
            include ('../assets/pages/page-financeplan.php');
        } else if(strcmp($_GET['page'], "profiles-edit") == 0) {
            include ('../assets/pages/page-accounts-edit.php');
        } else if(strcmp($_GET['page'], "my-settings") == 0) {
            include ('../assets/pages/page-my-settings.php');
        } else if(strcmp($_GET['page'], "games") == 0) {
            include ('../assets/pages/page-games.php');
        } else if(strcmp($_GET['page'], "games-edit") == 0) {
            include ('../assets/pages/page-games-edit.php');
        } else if(strcmp($_GET['page'], "games-add") == 0) {
            include ('../assets/pages/page-games-add.php');
        } else if(strcmp($_GET['page'], "changelog") == 0) {
            include ('../assets/pages/page-changelog.php');
        } else if(strcmp($_GET['page'], "partner-overview") == 0) {
            include ('../assets/pages/page-partner-accounts.php');
        } else if(strcmp($_GET['page'], "partner-fileupload") == 0) {
            include ('../assets/pages/page-partner-filemanager.php');
        }
        ?>
        </div>
    </div><!-- /#right-panel -->
    <?php include ('../assets/functions/load-modals.php'); ?>
    <!-- Right Panel -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
    
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>
    <script src="../assets/js/fusioncharts.js"></script>
    <script src="../assets/js/fusioncharts.charts.js"></script>
    <script src="../assets/js/fusioncharts.theme.zune.js"></script>
    <script src="../assets/js/twitter_chart.js"></script>

</body>
</html>
