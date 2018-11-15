<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Press releases</h1>
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
                        <h4 class="card-title mb-0">Latest Press releases</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM press_releases WHERE deleted='0' ORDER BY date DESC LIMIT 6";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {

                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                $excerp = utf8_encode($row['excerp']);
                                $title = utf8_encode($row['title']);
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge badge-info' style='margin-right: 0.5%;'>".$row['author']."</span>";
                                echo "<span style='font-weight: bold;'>".$title."</span>";
                                echo "<a href='$url/app/?page=press-releases-edit&pressid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate."  <a href='".$row['url']."'><span class='badge badge-dark'>Read more</span></a></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent press releases.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
