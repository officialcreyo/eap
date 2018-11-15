<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Invoices</h1>
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
                        <h4 class="card-title mb-0">Invoices Draft</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM invoices WHERE deleted='0' AND status='0'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {

                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['status'] == 0) { $status = "Draft"; $badgecolor = "badge-info"; } else if($row['status'] == 1) { $status = "Send"; $badgecolor = "badge-success"; } else if($row['status'] == 2) { $status = "Rejected"; $badgecolor = "badge-danger";   }
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."'>".$status."</span> <span>Issuer: </span><span style='font-weight: bold;'>".$row['company']."</span>  <span class='badge badge-secondary'> #".$row['id']."</span><span></span>";
                                echo "<a href='$url/app/?page=invoice-edit&invoiceid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<a href='".$row['saveurl']."' target='_blank'><button class='btn btn-link' style='float:right; margin-left: 5px;'>View</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST</div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent invoices.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Invoices Send</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <?php           
                        $sql = "SELECT * FROM invoices WHERE deleted='0' AND status='1'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while($row = mysqli_fetch_assoc($result)) {

                                $date = $row['date'];
                                $newdate = date('M jS Y', strtotime($date));
                                
                                if($row['status'] == 0) { $status = "Draft"; $badgecolor = "badge-info"; } else if($row['status'] == 1) { $status = "Send"; $badgecolor = "badge-success"; } else if($row['status'] == 2) { $status = "Rejected"; $badgecolor = "badge-danger";   }
                                
                                echo "<ol>";
                                echo "<div>";
                                echo "<span class='badge ".$badgecolor."'>".$status."</span> <span>Issuer: </span><span style='font-weight: bold;'>".$row['company']."</span>  <span class='badge badge-secondary'> #".$row['id']."</span><span></span>";
                                echo "<a href='$url/app/?page=invoice-edit&invoiceid=".$row['id']."'><button class='btn btn-primary' style='float:right;'>Edit</button></a>";
                                echo "<a href='".$row['saveurl']."' target='_blank'><button class='btn btn-link' style='float:right; margin-left: 5px;'>View</button></a>";
                                echo "<div class='small text-muted'>on ".$newdate." at ".$row['time']." CEST</div>";
                                echo "</div>";
                                echo "</ol>";
                            }
                        } else {
                            echo "<span>No recent invoices.</span>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>