<?php
    include ('../configs/page.php');
?>
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">General</h3><!-- /.menu-title -->
                    <li class="<?php if(strcmp($_GET['page'], "") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app"; ?>"> <i class="menu-icon fab fa-codepen"></i>Dashboard </a>
                    </li>
                    <li class="<?php if(strcmp($_GET['page'], "filemanager") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app/?page=filemanager"; ?>"> <i class="menu-icon fa fa-upload"></i>File Manager </a>
                    </li>
                    <h3 class="menu-title">Website Control</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "matches") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "matches-add") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gamepad"></i>Matches</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "matches") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "matches-add") == 0) { echo "active show"; } ?>">
                            <li><i class="fa fa-bars"></i><a href="<?php echo "$url/app/?page=matches"; ?>">Overview</a></li>
                            <li><i class="fa fa-plus"></i><a href="<?php echo "$url/app/?page=matches-add"; ?>">Add match</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "teams") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "teams-add") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Teams</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "teams") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "teams-add") == 0) { echo "active show"; } ?>">
                            <li><i class="fa fa-bars"></i><a href="<?php echo "$url/app/?page=teams"; ?>">Overview</a></li>
                            <li><i class="fa fa-plus"></i><a href="<?php echo "$url/app/?page=teams-add"; ?>">Add team</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "events") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "events-add") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-plane"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "events") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "events-add") == 0) { echo "active show"; } ?>">
                            <li><i class="fa fa-bars"></i><a href="<?php echo "$url/app/?page=events"; ?>">Overview</a></li>
                            <li><i class="fa fa-plus"></i><a href="<?php echo "$url/app/?page=events-add"; ?>">Add event</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "press-releases") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-alt"></i>Press releases</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bars"></i><a href="<?php echo "$url/app/?page=press-releases"; ?>">Overview</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="<?php echo "$url/app/?page=press-releases-add"; ?>">Add press release</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Workflow</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "tasks") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Tasks</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "tasks") == 0) { echo "active show"; } ?>">
                            <li><i class="menu-icon fa fa-bars"></i><a href="<?php echo "$url/app/?page=tasks"; ?>">Overview</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="<?php echo "$url/app/?page=tasks-add"; ?>">Add task</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "announcements") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bullhorn"></i>Announcements</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "announcements") == 0) { echo "active show"; } ?>">
                            <li><i class="menu-icon fa fa-bars"></i><a href="<?php echo "$url/app/?page=announcements"; ?>">Overview</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="<?php echo "$url/app/?page=announcements-add"; ?>">Add announcements</a></li>
                        </ul>
                    </li>

                    <?php if($mem_role > 1) { ?>
                    <h3 class="menu-title">Administration</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "options-account") == 0) { echo "active"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bars"></i><a href="<?php echo "$url/app/?page=accounts"; ?>">Overview</a></li>
                            <li><i class="menu-icon fa fa-plus"></i><a href="<?php echo "$url/app/?page=accounts-add"; ?>">Add account</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "settings") == 0) { echo "active"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="notclickable"><i class="menu-icon fa fa-columns"></i><a href="<?php echo "$url/app/?page=settings"; ?>">Panel (Disabled)</a></li>
                            <li><i class="menu-icon fa fa-gamepad"></i><a href="<?php echo "$url/app/?page=games"; ?>">Games</a></li>
                            <li class="notclickable"><i class="menu-icon fa fa-terminal"></i><a href="<?php echo "$url/app/?page=settings"; ?>">Logs (Disabled)</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($mem_id == 1000) { ?>
                    <li class="<?php if(strcmp($_GET['page'], "changelog") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app/?page=changelog"; ?>"> <i class="menu-icon fab fa-stack-exchange"></i>Changelog </a>
                    </li>
                    <?php } ?>
                </ul>
