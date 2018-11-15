<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Games</h1>
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

$gameid = $_GET['id'];

$query = "SELECT * FROM games WHERE id='$gameid'";
                
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Teameditor</strong>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?edit-game=1" method="post">
                    
                        <div class="form-group">
                            <input class="form-control" id="gameid" name="gameid" type="hidden" value="<?php echo $gameid;?>">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Name</h3>
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" type="text" placeholder="e.g. League of Legends" value="<?php echo $row['name']; ?>" required>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Identifier</h3>
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="text" placeholder="e.g. leagueoflegends" value="<?php echo $row['identifier']; ?>" readonly="readonly" required>
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