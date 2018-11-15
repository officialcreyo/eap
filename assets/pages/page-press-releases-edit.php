<?php
    $matchid = $_GET['pressid'];
?>

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
                <strong class="card-title">Press release editor</strong>
            </div>
            <div class="card-body">
                <?php
                
                $query = "SELECT * FROM press_releases WHERE id='$matchid'";
                
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                
                $author=$row['author'];
                $date=$row['date'];
                $excerp = utf8_encode($row['excerp']);
                $title = utf8_encode($row['title']);;
                $url=$row['url'];
                
                ?>
                <!---------------------------------HTML+PHP----------------------------------------->
                
                <form name="creatematch" action="../assets/functions/mysql-functions.php?update-press=1" method="post">
                                                
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $matchid;?>">
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD" value="<?php echo $date; ?>">
                          </div>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Author</h3>
                        <div class="form-group">
                            <input class="form-control" id="author" name="author" type="text" placeholder="e.g. 99Damage, Dexerto" value="<?php echo $author; ?>">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Title</h3>
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="Prismatic won ESL Finals" value="<?php echo $title; ?>">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Excerp</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="excerp" name="excerp" rows="3" placeholder="Place a short excerp (20-30 words)"><?php echo $excerp; ?></textarea>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">URL</h3>
                        <div class="form-group">
                            <input class="form-control" id="url" name="url" type="url" placeholder="e.g. 99damage.de/article/xyz" value="<?php echo $url; ?>">
                        </div>
                        <br>
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Update"/>
                            <input class="btn btn-danger" type="submit" id="update-btn" name="reset" value="Remove"/>
                        </div>

                    </form>
            </div>
        </div>
    </div>
</div>
