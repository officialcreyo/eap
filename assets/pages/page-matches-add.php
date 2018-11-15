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
                <strong class="card-title">Matcheditor</strong>
            </div>
            <div class="card-body">
                <form name="creatematch" action="../assets/functions/mysql-functions.php?add-match=1" method="post">
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

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date and time</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="time" name="time" type="time" placeholder="HH:MM">
                          </div>
                        </div>
                        <script type="text/javascript">
                            jQuery(function ($) { $(".select2").select2({ placeholder: "Select a Team" }); });
                            $.fn.select2.defaults.set( "theme", "bootstrap4" );
                        </script>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Team #1</h3>
                        <div class="form-group">
                            <select class="form-control select2" id="team1" name="team1" tabindex="-1" aria-hidden="true">
                                <?php
                                $sql = "SELECT * FROM teams WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['identifier']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Team #2</h3>
                        <div class="form-group">
                            <select class="form-control select2" id="team2" name="team2" tabindex="-1" aria-hidden="true">
                                <option></option>
                                <?php
                                $sql = "SELECT * FROM teams WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['identifier']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <a class="float-right" href="../../app/index.php?page=teams-add">Add team here</a>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Score #1 and #2</h3>
                        <div class="form-group row">
                            <div class="col-xs" style="margin-left: 15px;">
                                <input class="form-control" id="score1" name="score1" type="text" value="0">
                            </div>
                            <span style="margin-left: 15px; margin-top:5px;">:</span>
                            <div class="col-xs" style="margin-left: 15px;">
                                <input class="form-control" id="score2" name="score2" type="text" value="0">
                            </div>
                        </div>

                        <label class="radio-inline"><input type="radio" name="optradio" value="0" checked> No result</label><br>
                        <label class="radio-inline" style="margin-left: 0px;"><input type="radio" name="optradio" value="Win"> Win</label>
                        <label class="radio-inline" style="margin-left: 15px;"><input type="radio" name="optradio" value="Draw"> Draw</label>
                        <label class="radio-inline" style="margin-left: 15px;"><input type="radio" name="optradio" value="Lose"> Lose</label>

                        </div>
                        </div>
                        <div class="card">
                        <div class="card-body">

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 0px;">League</h3>
                        <div class="form-group">
                            <select class="form-control" id="league" name="league">
                                <option value="0"></option>
                                <?php
                                $sql = "SELECT * FROM events WHERE deleted='0' ORDER BY name";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Match-Link</h3>
                        <div class="form-group">
                            <input class="form-control" id="link" name="link" type="text" placeholder="e.g. http://url.com">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Stream-Link</h3>
                        <div class="form-group">
                            <input class="form-control" id="streamlink" name="streamlink" type="text" placeholder="e.g. http://twitch.tv">
                        </div>
                        <br>
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info btn-lg btn-block" type="submit" id="update-btn" name="submit" value="Create"/>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</div>
