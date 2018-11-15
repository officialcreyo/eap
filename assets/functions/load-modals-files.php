<?php
$sql = "SELECT * FROM fm_files";
$result = mysqli_query($conn, $sql);

$i=0;

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        
        ?>
        <!-- Modal -->
            <div class="modal fade" id="filedeletemodal<?php echo $row['fileid']; ?>" tabindex="-1" role="dialog" aria-labelledby="Task" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">You are about to delete a file... </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button><br>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete the file "<?php echo $row['filename']; ?>"?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="../assets/functions/mysql-functions.php?removefilefromfm=1&url=<?php echo $actual_link; ?>&fileid=<?php echo $row['fileid']; ?>" class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abort</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php

    }
}

$sql = "SELECT * FROM fm_folder";
$result = mysqli_query($conn, $sql);

$i=0;

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        
        ?>
        <!-- Modal -->
            <div class="modal fade" id="folderdeletemodal<?php echo $row['folderid']; ?>" tabindex="-1" role="dialog" aria-labelledby="Task" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">You are about to edit a folder... </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button><br>
                        </div>
                        <div class="modal-body">
                            <p>You have following options for the folder "<?php echo $row['foldername']; ?>":</p>
                            <p>You can simply delete or just edit it. But attention! You will delete all files in the folder.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="../../app/index.php?page=filemanager-editfolder?folderid=<?php echo $row['folderid']; ?>" class="btn btn-info">Edit</a>
                            <a href="../assets/functions/mysql-functions.php?removefolderfromfm=1&url=<?php echo $actual_link; ?>&folderid=<?php echo $row['folderid']; ?>" class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abort</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php

    }
}

?>