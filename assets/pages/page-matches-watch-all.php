<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Matches</h1>
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
                        <h4 class="card-title mb-0">All Matches</h4>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="cod-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Call of Duty</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="cs-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Counter-Strike</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="lol-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">League of Legends</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="fifa-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">FIFA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="rb6-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">RB6</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="gears-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Gears</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="cod-tab">
                  <br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='1' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div>  
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="cs-tab">
                  <br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='2' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div> 
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="lol-tab"><br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='3' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div> </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="fifa-tab"><br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='4' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div> </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="rb6-tab"><br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='5' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div> </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="gears-tab"><br>
                  <div>
                    <?php           
                        $sql = "SELECT * FROM matches WHERE deleted='0' AND result > '0' AND game='6' ORDER BY date DESC";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['game'] == 1) {
                                    $game = "Call of Duty";
                                } else if($row['game'] == 2) {
                                    $game = "Counter-Strike";
                                } else if($row['game'] == 3) {
                                    $game = "League of Legends";
                                } else if($row['game'] == 4) {
                                    $game = "FIFA";
                                } else if($row['game'] == 5) {
                                    $game = "Rainbow Six";
                                } else if($row['game'] == 6) {
                                    $game = "Gears Of War";
                                } 
                                else if($row['game'] == 10) {
                                    $game = "Other";
                                }
                                
                                if(strcmp($row['result'], "Win") == 0) { $badgecolor = "badge-success";}
                                if(strcmp($row['result'], "Lose") == 0) { $badgecolor = "badge-danger";}
                                if(strcmp($row['result'], "Draw") == 0) { $badgecolor = "badge-info";}
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."' style='margin-right: 0.5%;'>".$row['result']."</span>";
                                echo "<span class='badge badge-secondary' style='margin-right: 0.5%;'>$game</span>";
                                echo "<span style='font-weight: bold;'>".$row['team1']."</span><span> vs. </span><span style='font-weight: bold;'>".$row['team2']."</span>";
                                echo "<a href='$url/app/?page=matches-edit&matchid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST in <span class='badge badge-dark'>".$row['league']."</span></div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent matches.</span>";
                        }
                    ?>
                  </div> </div>
                </div>
            </div>
        </div>
    </div>
</div>
