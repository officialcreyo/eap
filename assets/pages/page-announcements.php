<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Announcements</h1>
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
        <a class="btn btn-success" href="<?php echo "$url/app/?page=announcements-add"; ?>">+ Create new announcement</a>
        <div class="card" style="margin-top: 2%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Latest announcements</h4>
                    </div>
                </div>
                <hr>
                <div>
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
                            $excerp=$row['excerp'];
                            $excerp = nl2br($excerp);
                            $datapath = $row['datapath'];

                            $query = "SELECT * FROM member WHERE mem_id=$author";
                            $result1 = mysqli_query($conn, $query);
                            $row1 = mysqli_fetch_assoc($result1);

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
                            if($i > 0) { echo "<hr>"; } else {}
                            echo "<div class='row'>";
                            echo "<div class='col-sm-10'>";
                            echo "<img class='user-avatar rounded-circle float-left' width=40 style='display: block;' src='".$row1['avatar']."' alt='User Avatar'>";
                            echo "<a href='$url/app/?page=profiles&id=".$row['author']."' style='color: #0095eb !important; font-weight: bold; margin-left: 0.5%;'>".$row1['firstname']." '".$row1['nickname']."' ".$row1['lastname']."</a> ".$userstatus."";
                            echo "<div class='small text-muted' style='display: block; margin-left: 1%'>".$row['title']." - ".$newdate." at ".$time." CEST</div>";
                            echo "<p style='color: black !important; margin-top: 1%;'>".$excerp."</p>";
                            if(!empty($datapath)) { echo "<div class='small'><span>Attached file: </span><a href='$datapath' target='_blank'>".$row['filename']."</a></div>"; }
                            echo "</div>";
                            echo "<div class='col-sm-2'>";
                            echo "<a class='btn btn-info' style='margin-top: 25%;' href='/app/?page=announcements-edit&anid=".$row['id']."'>Edit</a>";
                            echo "</div>";
                            echo "</ol>";
                            $i++;

                        }
                    } else {
                        echo "<span>No announcements.</span>";
                    }
                    ?>
                <span class="float-right"><a href="./?page=announcements-all"><i class="fa fa-bullhorn"></i> Watch all announcements</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
