<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Teams</h1>
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

<?php

$teamid = $_GET['id'];

$query = "SELECT * FROM teams WHERE id='$teamid'";
                
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<div class="content mt-3">
    <?php if(strcmp($_GET['error'], "name") == 0) { echo "<div class='col-sm-12'><div class='alert alert-danger'>Name already exists in database!</div></div>"; } else if(strcmp($_GET['error'], "identifier") == 0) { echo "<div class='col-sm-12'><div class='alert alert-danger'>Identifier already exists in database!</div></div>"; }  ?>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Teameditor</strong>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?edit-team=1" method="post">
                    
                        <div class="form-group">
                            <input class="form-control" id="teamid" name="teamid" type="hidden" value="<?php echo $teamid;?>">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Name</h3>
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" type="text" placeholder="e.g. Team SoloMid" value="<?php echo $row['name']; ?>" required>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Identifier</h3>
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="text" placeholder="e.g. teamsolomid" value="<?php echo $row['identifier']; ?>" readonly="readonly" required>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Country</h3>
                        <div class="form-group">
                            <input class="form-control" id="country" name="country" type="text" placeholder="e.g. Germany" value="<?php echo $row['country']; ?>"  required>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Logo File</h3>
                        <img src="<?php echo $row['logo']; ?>" height="150">
                        <input class="form-control-file" style="margin-top:0.5%;" type="file" name="uploaded_file">
                        <br>
                        <div class="alert alert-warning" role="alert">
                            Be aware! Logo should fit into a light background!
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