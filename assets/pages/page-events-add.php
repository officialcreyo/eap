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
                    <li class="active">Add</li>
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
                <form name="creatematch" action="../assets/functions/mysql-functions.php?add-event=1" method="post">
                        <h3 class="lead" style="margin-bottom: 5px;">Game type</h3>
                        <div class="form-group">
                            <select class="form-control" id="game" name="game">
                                <?php
                                $sql = "SELECT * FROM games WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date range</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="time" name="time" type="time" placeholder="HH:MM">
                          </div>
                            <span style="margin-left: 10px; margin-top: 5px;"> until</span>
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="todate" name="todate" type="date" placeholder="YYYY-MM-DD">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="totime" name="totime" type="time" placeholder="HH:MM">
                          </div>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">League</h3>
                        <div class="form-group">
                            <input class="form-control" id="league" name="league" type="text" placeholder="e.g. ESL Meisterschaft">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Link</h3>
                        <div class="form-group">
                            <input class="form-control" id="link" name="link" type="text" placeholder="e.g. http://url.com">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Logo</h3>
                        <div class="form-group">
                            <input class="form-control" id="logo" name="logo" type="text" placeholder="e.g. http://i.epvpimg.com/AVXAbab.png">
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Options</h3>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" name="customControlInline" value="1">
                            <label class="custom-control-label" for="customControlInline">Display on website</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info btn-lg btn-block" type="submit" id="update-btn" name="submit" value="Create"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
