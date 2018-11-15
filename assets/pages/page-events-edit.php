<?php
    $eventid = $_GET['eventid'];
?>

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
                <strong class="card-title">Eventeditor</strong>
            </div>
            <div class="card-body">
                <?php
                
                $matchid=$_GET['eventid'];
                
                $query = "SELECT * FROM events WHERE id='$matchid'";    
            
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                
                $game=$row['game'];
                $eventname=$row['name'];
                $date=$row['date'];
                $time=$row['time'];
                $link=$row['link'];
                $logo=$row['logo'];
                $todate=$row['todate'];
                $totime=$row['totime'];
                $display=$row['display'];
                
                if($display > 0) { $checked = "checked"; }

                ?>
                <!---------------------------------HTML+PHP----------------------------------------->
                
                <form name="creatematch" action="../assets/functions/mysql-functions.php?update-event=1" method="post">
                        <h3 class="lead" style="margin-bottom: 5px;">Game type</h3>
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
                        
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $matchid;?>">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 30px;">Date range</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" value="<?php echo $date; ?>">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="time" name="time" type="time" value="<?php echo $time; ?>">
                          </div>
                            <span style="margin-left: 10px; margin-top: 5px;"> until</span>
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="todate" name="todate" type="date" value="<?php echo $todate; ?>">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="totime" name="totime" type="time" value="<?php echo $totime; ?>">
                          </div>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">League</h3>
                        <div class="form-group">
                            <input class="form-control" id="league" name="league" type="text" value="<?php echo $eventname; ?>">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Link</h3>
                        <div class="form-group">
                            <input class="form-control" id="link" name="link" type="text" value="<?php echo $link; ?>">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Logo</h3>
                        <div class="form-group">
                            <input class="form-control" id="logo" name="logo" type="text" value="<?php echo $logo; ?>">
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Options</h3>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" name="customControlInline" value="1" <?php echo $checked; ?>>
                            <label class="custom-control-label" for="customControlInline">Display on website</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container-login100-form-btn">
                            <input class="btn btn-success" type="submit" id="update-btn" name="finish" value="Finish"/>
                            <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Update"/>
                            <input class="btn btn-danger" type="submit" id="update-btn" name="reset" value="Remove"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
