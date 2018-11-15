<?php
    $matchid = $_GET['matchid'];
?>

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
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Matcheditor</strong>
            </div>
            <div class="card-body">
                <?php
                
                $matchid=$_GET['matchid'];
                
                $query = "SELECT * FROM matches WHERE id='$matchid'";
                
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                
                $game=$row['game'];
                $time=$row['time'];
                $date=$row['date'];
                $team1=$row['team1'];
                $team2=$row['team2'];
                $league=$row['league'];
                $link=$row['link'];
                $streamlink=$row['streamlink'];
                $score1=$row['score1'];
                $score2=$row['score2'];
                $result=$row['result'];
                $logo1=$row['team1logo'];
                $logo2=$row['team2logo'];
                
                ?>
                <!---------------------------------HTML+PHP----------------------------------------->
                
                <form name="updatematch" action="../assets/functions/mysql-functions.php?update-match=1" method="post">
                    
                    <div class="form-group">
                        <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $matchid;?>">
                    </div>
                    
                    <h4 class="lead" style="margin-bottom: 5px;">Game type</h4>
                    <div class="form-group">
                        <select class="form-control" id="game" name="game">
                            <?php
                                $sql = "SELECT * FROM games WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        if($row['id'] == $game) { $select = "selected='selected'"; } else { $select = ""; }
                                        echo "<option value='".$row['id']."' $select>".$row['name']."</option>";
                                    }
                                }
                                ?>
                        </select>
                    </div>

                    <h4 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date and time</h4>
                    <div class="form-group row">
                      <div class="col-sm-3" style="">
                        <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD" value="<?php echo $date; ?>">
                      </div>
                      <div class="col-sm-4" style="">
                        <input class="form-control" id="time" name="time" type="time" placeholder="HH:MM" value="<?php echo $time; ?>">
                      </div>
                    </div>
                    <script type="text/javascript">
                        jQuery(function ($) { $(".select2").select2({ placeholder: "Select a Team" }); });
                        $.fn.select2.defaults.set( "theme", "bootstrap4" );
                        $('#team1').select2("val", null); //a lil' bit more :)
                        $('#team2').select2("val", null); //a lil' bit more :)
                    </script>
                    <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Team #1</h3>
                    <div class="form-group">
                        <select class="form-control select2" id="team1" name="team1">
                            <option></option>
                            <?php
                                $sql1 = "SELECT * FROM teams WHERE deleted='0'";
                                $result1 = mysqli_query($conn, $sql1);

                                if (mysqli_num_rows($result1) > 0) {

                                    while($row = mysqli_fetch_array($result1)) 
                                    {
                                        if($team1 == $row['identifier']) 
                                        { 
                                            $selected = "selected='selected'"; 
                                        } 
                                        else 
                                        { 
                                            $selected = ""; 
                                        }
                                        echo "<option value='".$row['identifier']."' ".$selected.">".$row['name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    
                    <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Team #2</h3>
                        <div class="form-group">
                            <select class="form-control select2" id="team2" name="team2">
                                <option></option>
                                <?php 
                                $sql2 = "SELECT * FROM teams WHERE deleted='0'";
                                $result2 = mysqli_query($conn, $sql2);

                                if (mysqli_num_rows($result2) > 0) 
                                {
                                    while($row = mysqli_fetch_array($result2)) 
                                    {
                                        if($team2 == $row['identifier']) { $selected = "selected='selected'"; } else { $selected = ""; }
                                        echo "<option value='".$row['identifier']."' ".$selected.">".$row['name']."</option>";
                                    }
                                }
                                 ?>
                            </select>
                        </div>
                        <a class="float-sm-right" href="../../app/index.php?page=teams-add">Add team here</a>
                    
                    <h4 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Score #1 and #2</h4>
                    <div class="form-group row">
                      <div class="col-sm-4" style="">
                        <input class="form-control" id="score1" name="score1" type="text" placeholder="6" value="<?php echo $score1; ?>">
                      </div>
                      <span style="margin-left: 15px; margin-top:5px;">:</span>
                      <div class="col-sm-4" style="">
                        <input class="form-control" id="score2" name="score2" type="text" placeholder="2" value="<?php echo $score2; ?>">
                      </div>
                    </div>
                    
                    <label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $result; ?>" checked> Current result: <?php if($result == 0) { echo "No result"; } ?></label><br>
                    <label class="radio-inline" style="margin-left: 0px;"><input type="radio" name="optradio" value="Win"> Win</label>
                    <label class="radio-inline" style="margin-left: 15px;"><input type="radio" name="optradio" value="Draw"> Draw</label>
                    <label class="radio-inline" style="margin-left: 15px;"><input type="radio" name="optradio" value="Lose"> Lose</label>
                    
                    </div>
                    </div>
                    <div class="card">
                    <div class="card-body">
                    <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">League</h4>
                    <div class="form-group">
                        <input class="form-control" id="league" name="league" type="text" placeholder="e.g. ESL Meisterschaft" value="<?php echo $league; ?>">
                    </div>
                    
                    <h4 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Match-Link</h4>
                    <div class="form-group">
                        <input class="form-control" id="link" name="link" type="text" placeholder="e.g. http://url.com" value="<?php echo $link; ?>">
                    </div>
                    
                    <h4 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Stream-Link</h4>
                    <div class="form-group">
                        <input class="form-control" id="streamlink" name="streamlink" type="text" placeholder="e.g. http://twitch.tv" value="<?php echo $streamlink; ?>">
                    </div>
                    </div>
                    <div class="card-footer">
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Update"/>
                            <input class="btn btn-danger" type="submit" id="update-btn" name="reset" value="Remove"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
