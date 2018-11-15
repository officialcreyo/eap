<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tasks</h1>
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
        <a class="btn btn-success" href="<?php echo "$url/app/?page=tasks-add"; ?>">+ Create new task</a>
        <div class="card" style="margin-top: 2%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Created tasks</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php
                    $sql = "SELECT * FROM tasks WHERE deleted='0' AND finished='0' AND fromuser='$mem_id' ORDER BY todate";
                    $result = mysqli_query($conn, $sql);

                    $i=0;

                    if (mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_assoc($result)) {

                            $fromdate=$row["fromdate"];
                            $todate=$row["todate"];

                            $newtodate = date('jS F Y', strtotime($todate));
                            $newfromdate = date('jS F Y', strtotime($fromdate));

                            $date2 = new DateTime();
                            $date3 = DateTime::createFromFormat("Y-m-d", $todate);
                            if($date2 > $date3) { $difftostart = $date2->diff($date3)->format("%a day(s) over"); $alertdiff = "red"; } else { $difftostart = $date2->diff($date3)->format("%a day(s) left"); $alertdiff = "#000"; }

                            $totime=$row["totime"];
                            $author=$row['fromuser'];

                            $query = "SELECT * FROM member WHERE mem_id=$author";
                            $result1 = mysqli_query($conn, $query);
                            $row1 = mysqli_fetch_assoc($result1);

                            if($row['importance'] == 0) { $importance = "Low"; $badgecolor = "info"; };
                            if($row['importance'] == 1) { $importance = "Mid"; $badgecolor = "success"; };
                            if($row['importance'] == 2) { $importance = "High"; $badgecolor = "danger"; };

                            echo "<ol>";
                            echo "<div>";
                            if($i > 0) { echo "<hr>"; } else {}
                            echo "<div>";
                            echo "<span class='badge badge-".$badgecolor."'>".$importance."</span><strong><a data-toggle='modal' data-target='#taskmodal".$row['id']."'> ".$row['title']."</a></strong><span> ".$difftostart."</span><span class='small float-right'> Time until: ".$newtodate.", ".$totime." CEST</span>";
                            echo "<div class='small text-muted'><span>Task assigned by: </span><a href='$url/app/?page=profiles&id=".$author."'>".$row1['firstname']." '".$row1['nickname']."' ".$row1['lastname']."</a></div>";
                            echo "<div></div>";
                            echo "</ol>";
                            $i++;

                        }
                    } else {
                        echo "<span>No tasks created.</span>";
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
                        <h4 class="card-title mb-0">Assigned tasks</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php
                    $sql = "SELECT * FROM tasks WHERE deleted='0' AND finished='0' AND fromuser!='$mem_id' ORDER BY todate";
                    $result = mysqli_query($conn, $sql);

                    $i=0;

                    if (mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_assoc($result)) {
                            
                            $touserarray = json_decode($row['touser']);
                            
                            if(!in_array($mem_id, $touserarray)) {
                                continue;
                            }

                            $fromdate=$row["fromdate"];
                            $todate=$row["todate"];

                            $newtodate = date('jS F Y', strtotime($todate));
                            $newfromdate = date('jS F Y', strtotime($fromdate));

                            $date2 = new DateTime();
                            $date3 = DateTime::createFromFormat("Y-m-d", $todate);
                            if($date2 > $date3) { $difftostart = $date2->diff($date3)->format("%a day(s) over"); $alertdiff = "red"; } else { $difftostart = $date2->diff($date3)->format("%a day(s) left"); $alertdiff = "#000"; }

                            $totime=$row["totime"];
                            $author=$row['fromuser'];

                            $query = "SELECT * FROM member WHERE mem_id=$author";
                            $result1 = mysqli_query($conn, $query);
                            $row1 = mysqli_fetch_assoc($result1);

                            if($row['importance'] == 0) { $importance = "Low"; $badgecolor = "info"; };
                            if($row['importance'] == 1) { $importance = "Mid"; $badgecolor = "success"; };
                            if($row['importance'] == 2) { $importance = "High"; $badgecolor = "danger"; };

                            echo "<ol>";
                            echo "<div>";
                            if($i > 0) { echo "<hr>"; } else {}
                            echo "<div>";
                            echo "<span class='badge badge-".$badgecolor."'>".$importance."</span><strong><a data-toggle='modal' data-target='#taskmodal".$row['id']."'> ".$row['title']."</a></strong><span> ".$difftostart."</span><span class='small float-right'> Time until: ".$newtodate.", ".$totime." CEST</span>";
                            echo "<div class='small text-muted'><span>Task assigned by: </span><a href='$url/app/?page=profiles&id=".$author."'>".$row1['firstname']." '".$row1['nickname']."' ".$row1['lastname']."</a></div>";
                            echo "<div></div>";
                            echo "</ol>";
                            $i++;

                        }
                        if($i == 0) {
                            echo "<span>No tasks to complete.</span>";
                        }
                    } else {
                        echo "<span>No tasks to complete.</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>