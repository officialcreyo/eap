<?php
    function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $folderurl = $_GET['folder'];

    $query1 = "SELECT * FROM fm_folder WHERE folderid='$folderurl'";
                
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $previousfolder = $row1['folderisinfolderid'];
    $foldername = $row1['foldername'];

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>File Manager</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php echo $foldername; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3" onload="setup()">
    <div class="col-sm-12">
        <div class="btn-group">
            <a class="btn btn-light" href="../../app/index.php?page=filemanager"><i class="fa fa-home"></i></a>
            <a class="btn btn-primary" href="../../app/index.php?page=filemanager&folder=<?php echo $previousfolder; ?>"><i class="fa fa-undo"></i> Back</a>
        </div>
        <div class="user-area dropdown">
            <button class="dropdown-toggle btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                +
            </button>
            <div class="user-menu dropdown-menu" x-placement="bottom-start" style="position: absolute;">
                <a class="nav-link" href="<?php echo "$actual_link&upload=1"; ?>"><i class="fa fa-upload"></i> Upload file(s)</a>
                <a class="nav-link" href="<?php echo "$actual_link&createfolder=1"; ?>"><i class="fa fa-folder-open"></i> Create folder</a>
            </div>
        </div>
    </div>
</div>
<?php if($_GET['upload']) { ?>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo "$actual_link&upload=0"; ?>"><i class="fa fa-times float-right"></i></a>
                <h4>Upload multiple file(s)</h4>
                <br>
                <form enctype="multipart/form-data" id="form" action="../assets/functions/mysql-functions.php?add-filemanager=1" method="POST">
                    <input type="hidden" name="ident" id="ident" value="<?php echo $mem_id; ?>">
                    <input type="hidden" name="folderid" id="folderid" value="<?php echo $folderurl; ?>">
                    <input class="form-control-file" type="file" name="uploaded_file[]" id="uploaded_file" multiple>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if($_GET['createfolder']) { ?>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo "$actual_link&createfolder=0"; ?>"><i class="fa fa-times float-right"></i></a>
                <h4>Create new folder</h4>
                <br>
                <form enctype="multipart/form-data" id="form" action="../assets/functions/mysql-functions.php?add-filemanager-folder=1" method="POST">
                    <input type="hidden" name="folderid" id="folderid" value="<?php echo $folderurl; ?>">
                    <input class="form-control" name="foldername" id="foldername" required>
                    <br>
                    <button class="btn btn-success" type="submit" id="submit" name="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 70%">Name</th>
                                <th style="width: 9%">Size</th>
                                <th style="width: 10%"></th>
                                <th style="width: 3%"></th>
                                <th style="width: 3%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $folderurl = $_GET['folder'];

                            $sql = "SELECT * FROM fm_sp_folder WHERE folderisinfolderid='$folderurl' AND deleted='0' ORDER BY foldername";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $folderid = $row['folderid'];
                                    $foldername = $row['foldername'];

                                    echo "<tr>";
                                    echo "<th><i class='fa fa-folder' style='font-size: 20px;'></i></th>";
                                    ?><td onclick="window.location='<?php echo "$url/app/index.php?page=filemanager&folder=$folderid"; ?>';"><?php echo "<a href='$url/app/index.php?page=filemanager&folder=$folderid' style='color: #0095eb !important;'>$foldername</a></td>";
                                    echo "<td></td>";
                                    echo "<td><a class='btn btn-success' data-toggle='modal' data-target='#folderdeletemodal".$folderid."'><i class='fa fa-edit' style='color: white !important'></i></a></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>

                            <?php

                            $folderurl = $_GET['folder'];

                            $sql = "SELECT * FROM fm_sp_files WHERE infolder='$folderurl' AND deleted='0' ORDER BY filename";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    $fileid = $row['fileid'];
                                    $filename = $row['filename'];
                                    $path = $row['path'];
                                    $date = $row['uploaddate'];
                                    $time = $row['uploadtime'];
                                    $uploader = $row['uploadfrom'];

                                    $query = "SELECT * FROM member WHERE mem_id='$uploader'";
                                    $res = mysqli_query($conn, $query);
                                    $row1 = mysqli_fetch_assoc($res);

                                    $uploadername = $row1['nickname'];

                                    $filesize = human_filesize(filesize($path));

                                    echo "<tr title='File was uploaded by $uploadername on $date at $time CEST'>";
                                    echo "<th><i class='fa fa-file' style='font-size: 20px;'></i></th>";
                                    echo "<td><a href='#' style='color: #0095eb !important;'>".$filename."</a></td>";
                                    echo "<td>$filesize</td>";
                                    echo "<td><a class='btn btn-danger' data-toggle='modal' data-target='#filedeletemodal".$fileid."'><i class='fa fa-trash' style='color: white !important'></i></a></td>";
                                    echo "<td><a class='btn btn-primary' href='$path' download='$filename' download><i class='fa fa-download'></i></a></td>";
                                    echo "<td><a class='btn btn-light' href='$path' target='_blank'><i class='fa fa-eye'></i></a></td>";
                                    echo "</tr>";
                                }
                            }
                            else
                            {
                                echo "<tr>";
                                echo "<th></th>";
                                echo "<td>No files were found. Upload a file to fill empty space. Just press the green <i class='fa fa-plus'></i> on the top right :)</a></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("uploaded_file").onchange = function() {
    document.getElementById("form").submit();
};
</script>

<?php include ('../assets/functions/load-modals-files.php'); ?>