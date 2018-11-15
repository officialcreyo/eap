<?php
    include ('../configs/page.php');
?>
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">General</h3><!-- /.menu-title -->
                    <li class="<?php if(strcmp($_GET['page'], "") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app/partner.php"; ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="<?php if(strcmp($_GET['page'], "filemanager") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app/partner.php?page=filemanager"; ?>"> <i class="menu-icon fa fa-file"></i>File Manager </a>
                    </li>
                    <li class="<?php if(strcmp($_GET['page'], "reportings") == 0) { echo "active"; } ?>">
                        <a href="<?php echo "$url/app/partner.php?page=reportings"; ?>"> <i class="menu-icon fa fa-comments"></i>Reportings </a>
                    </li>
                    <h3 class="menu-title">Website Control</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown <?php if(strcmp($_GET['page'], "advertisement") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "advertisement-add") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "advertisement-stats") == 0) { echo "active show"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fab fa-adversal"></i>Advertisements</a>
                        <ul class="sub-menu children dropdown-menu <?php if(strcmp($_GET['page'], "advertisement") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "advertisement-add") == 0) { echo "active show"; } else if(strcmp($_GET['page'], "advertisement-stats") == 0) { echo "active show"; } ?>">
                            <li><i class="fa fa-bars"></i><a href="<?php echo "$url/app/partner.php?page=advertisement"; ?>">Overview</a></li>
                            <li><i class="fa fa-chart-line"></i><a href="<?php echo "$url/app/partner.php?page=advertisement-stats"; ?>">Statistics</a></li>
                            <li><i class="fa fa-plus"></i><a href="<?php echo "$url/app/partner.php?page=advertisement-add"; ?>">Add advertisement</a></li>
                        </ul>
                    </li>
                </ul>