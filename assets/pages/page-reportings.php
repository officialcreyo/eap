<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Reportings</h1>
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
        <a class="btn btn-success" href="<?php echo "$url/app/?page=reportings-add"; ?>">+ Create new reporting</a>
        <div class="accordion" id="accordionExample" style="margin-top: 2%;">
        <?php
            $sql = "SELECT * FROM reportings WHERE deleted='0'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $row['id']; ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <i class="menu-icon fa fa-comments"></i> <?php echo $row['title']; ?>
                        </button>
                    </h5>
                </div>

                <div id="collapse<?php echo $row['id']; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <span><i class="menu-icon fa fa-calendar"></i> Event: <?php echo $row['event']; ?></span><br>
                        <span><i class="menu-icon fa fa-clock"></i> Date: <?php echo $row['date']; ?></span>
                        <hr>
                        <p>Summary</p>
                        <?php echo $row['text']; ?>
                        <hr>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="<?php echo $row['saveurl']; ?>" style="margin-right: 2%;"><i class="fa fa-eye"></i> View file</a>
                            <a class="btn btn-secondary" href="<?php echo $row['saveurl']; ?>" download='<?php echo $row['file_name']; ?>' download><i class="fa fa-download"></i> Download</a>
                        </div>
                    </div>
                </div>
          </div>
        <?php } } ?>
        </div>
    </div>
</div>