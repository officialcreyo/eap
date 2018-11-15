<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
<script>
    $(document).ready( function () {
        $('#table_id2').DataTable( { responsive: true });
    } );
</script>
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
                    <li class="active">Overview</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-12 animated fadeIn">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">All teams</h4>

                    </div>
                </div>
                <hr>
                <div class="hideonmobile">
                    <table id="table_id" class="table table-hover table-bordered dataTable no-footer display">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Identifier</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            $sql = "SELECT * FROM teams WHERE deleted='0'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr ondblclick="window.location='<?php $teamid=$row['id']; echo "$url/app/?page=teams-edit&id=$teamid"; ?>';">
                                    <td><img src="<?php echo $row['logo']; ?>" width="40"></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['identifier']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                </tr>
                                <?php } } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="hideondesktop">
                    <table id="table_id2" class="table table-hover table-bordered dataTable table-responsive no-footer display">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Identifier</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            $sql = "SELECT * FROM teams WHERE deleted='0'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr onclick="window.location='<?php $teamid=$row['id']; echo "$url/app/?page=teams-edit&id=$teamid"; ?>';">
                                    <td><img src="<?php echo $row['logo']; ?>" width="40"></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['identifier']; ?></td>
                                    <td><?php echo $row['country']; ?></td>
                                </tr>
                                <?php } } ?>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
</div>