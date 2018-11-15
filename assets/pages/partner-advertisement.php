<?php

$sp_id = $_SESSION['sp_id'];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Advertisements</h1>
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
                        <h4 class="card-title mb-0">Running advertisements</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM advertisements WHERE addeleted='0' AND adrunning='1' AND adfromaccount='$sp_id' ORDER BY adfromdate DESC, adfromtime DESC";
                        $result = mysqli_query($conn, $sql);

                        $i=0;
                    
                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                
                                $fromdate = $row['adfromdate'];
                                $fromtime = $row['adfromtime'];
                                $totime = $row['adtotime'];
                                $todate = $row['adtodate'];
                                $picture = $row['adpicture'];
                                $title  = $row['adtitle'];
                                $description  = $row['adtext'];
                                
                                $Draw_time = "$todate $totime";
                                $date = DateTime::createFromFormat("Y-m-d H:i:s", $Draw_time);
                                $date2 = new DateTime();  
                                $diffstarted = $date2->diff($date)->format("%a days and %H hours and %i minutes and %s seconds left.");
                                
                                echo "<ol>";
                                echo "<div>";
                                if($i > 0) { echo "<hr>"; } else {}
                                echo "<h4 class='float-md-left'>$title</h4>";
                                echo "<span class='float-md-right text-muted'>$diffstarted</span>";
                                echo "<br>";
                                echo "<p class='float-md-left' style='margin-top: 0.2%;'>$description</p>";
                                echo "<button class='btn btn-link float-right' disabled>Editing is disabled, message Support</button>";
                                echo "</div>";
                                echo "<br>";
                                echo "<br>";
                                echo "</ol>";
                                $i++;

                            }
                        } else {
                            echo "<span>No running advertisement.</span>";
                        }
                    ?>
                </div>
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
                        <h4 class="card-title mb-0">Planned advertisements</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM advertisements WHERE addeleted='0' AND adrunning='0' AND adfinished='0' AND adfromaccount='$sp_id' ORDER BY adfromdate DESC, adfromtime DESC";
                        $result = mysqli_query($conn, $sql);
                    
                        $i=0;    
                
                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                
                                $fromdate = $row['adfromdate'];
                                $fromtime = $row['adfromtime'];
                                $totime = $row['adtotime'];
                                $todate = $row['adtodate'];
                                $picture = $row['adpicture'];
                                $title  = $row['adtitle'];
                                $description  = $row['adtext'];
                                
                                $Draw_time1 = "$fromdate $fromtime";
                                $date2 = new DateTime();
                                $date3 = DateTime::createFromFormat("Y-m-d H:i:s", $Draw_time1);
                                $difftostart = $date2->diff($date3)->format("%a days and %H hours and %i minutes and %s seconds until start.");
                                
                                echo "<ol>";
                                echo "<div>";
                                if($i > 0) { echo "<hr>"; } else {}
                                echo "<h4 class='float-md-left'>$title</h4>";
                                echo "<span class='float-md-right text-muted'>$difftostart</span>";
                                echo "<br>";
                                echo "<p class='float-md-left' style='margin-top: 0.2%;'>$description</p>";
                                echo "<button class='btn btn-info float-right'>Edit</button>";
                                echo "</div>";
                                echo "<br>";
                                echo "<br>";
                                echo "</ol>";
                                $i++;
                                
                            }
                        } else {
                            echo "<span>No planned advertisement.</span>";
                        }
                    ?>
                </div>
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
                        <h4 class="card-title mb-0">Recent advertisements</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM advertisements WHERE addeleted='0' AND adfinished='1' AND adfromaccount='$sp_id' ORDER BY adfromdate DESC, adfromtime DESC LIMIT 3";
                        $result = mysqli_query($conn, $sql);
                        
                        $i=0;
                        
                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                
                                $fromdate = $row['adfromdate'];
                                $fromtime = $row['adfromtime'];
                                $totime = $row['adtotime'];
                                $todate = $row['adtodate'];
                                $picture = $row['adpicture'];
                                $title  = $row['adtitle'];
                                $description  = $row['adtext'];
                                
                                echo "<ol>";
                                echo "<div>";
                                if($i > 0) { echo "<hr>"; } else {}
                                echo "<h4 class='float-md-left'>$title</h4>";
                                echo "<br>";
                                echo "<p class='float-md-left' style='margin-top: 0.2%;'>$description</p>";
                                echo "</div>";
                                echo "<br>";
                                echo "<br>";
                                echo "</ol>";
                                $i++;

                            }
                        } else {
                            echo "<span>No recent advertisement.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
