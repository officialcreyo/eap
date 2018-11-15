<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Events</h1>
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
                        <h4 class="card-title mb-0">All Events</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM events WHERE deleted='0' ORDER BY date DESC";
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

                                if($startdate <= $now && $now <= $enddate) { $liveenable="<br><span class='livespanevent' ><span class='livedot'></span> <span>Live</span></span>"; } else { $liveenable="<span></span>"; }

                                echo "<div>
                                <img src='" . $row["logo"]. "' style='width: 40px; float: left; display: block;'>
                                <div style='display:block; overflow: hidden;'>
                                <span style='margin-left: 10px; font-weight: bold; float: left;'>" . $row["name"]. "</span>
                                <br>
                                <p style='margin-left: 10px;'>" . $newdate." - " . $newtodate. "<span><a href='$url/app/?page=events-edit&eventid=".$row['id']."'><button class='btn btn-primary float-right' style='margin-left: 2%;'>Edit</button></a></span>". $liveenable."</p>
                                </div>
                                </div>";

                            }
                        } else {
                            echo "<span>No upcoming Events.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>