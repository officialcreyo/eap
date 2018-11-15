<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Accounts</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Overview</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Account overview</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <table id="table_id" class="table table-hover table-bordered dataTable no-footer display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            $sql = "SELECT * FROM member WHERE deleted='0'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) { 
                                    if($row['role'] == 0) {
                                        $role = "User";
                                    } else if($row['role'] == 1) {
                                        $role = "Moderator";
                                    } else if($row['role'] == 2) {
                                        $role = "Admin";
                                    } else if($row['role'] == 5) {
                                        $role = "Superadmin";
                                    }
                                    
                                ?>
                                <tr ondblclick="window.location='<?php $memberid=$row['mem_id']; echo "$url/app/?page=accounts-edit&accountid=$memberid"; ?>';">
                                    <td><?php echo $row['mem_id']; ?></td>
                                    <td><?php echo $row['firstname']; if(!empty($row['nickname'])) { echo " '".$row['nickname']."' "; } else { echo " "; } echo $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $role; ?></td>
                                    <td><a href="<?php echo "$url/app/?page=profiles&id=$memberid"; ?>" target="_blank">Visit profile</a></td>
                                </tr>
                                <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
