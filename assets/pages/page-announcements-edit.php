<?php

$anid = $_GET['anid'];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Announcements</h1>
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
            <div class="card-body">
                <?php
                
                $query = "SELECT * FROM announcements WHERE id='$anid'";
                
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                
                $title=$row['title'];
                $text=$row['excerp'];
                $datapath=$row['datapath'];
                
                if($importance == 0 ) { $importancetext = "Low"; } else if($importance == 1 ) { $importancetext = "Medium"; } else if($importance == 2 ) { $importancetext = "High"; }
                
                ?>
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Edit annoucement</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <form action="../assets/functions/mysql-functions.php?edit-task=1" method="post"> 
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $anid;?>">
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Title</h4>
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="e.g. Stream design" value="<?php echo $title;?>">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Description</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="detail" name="detail" rows="5" placeholder="Place a detailed description."><?php echo $text; ?></textarea>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Additional File</h3>
                        <input class="form-control-file" type="file" name="uploaded_file" value="<?php echo $datapath;?>">
                        <br>
                        <br>
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info btn-lg btn-block" type="submit" id="update-btn" name="submit" value="Create"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>