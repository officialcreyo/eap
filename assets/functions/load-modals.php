<?php
$sql = "SELECT * FROM tasks WHERE deleted='0' AND finished='0' ORDER BY todate DESC";
$result = mysqli_query($conn, $sql);

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$i=0;

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {

        $fromdate=$row["fromdate"];
        $todate=$row["todate"];
        
        $newtodate = date('jS F Y', strtotime($todate));
        $newfromdate = date('jS F Y', strtotime($fromdate));
        
        $timeleft = $newtodate-$newfromdate;
        
        $timeleft = abs($timeleft);
        
        $totime=$row["totime"];
        $author=$row['fromuser'];
        $foreman=$row['assigneduser'];
            
            
        $worker=$row['touser'];
        $deworker = json_decode($worker, true);
        
        $query = "SELECT * FROM member WHERE mem_id=$author";
        $result1 = mysqli_query($conn, $query);
        $row1 = mysqli_fetch_assoc($result1);
        
        
        if($row['importance'] == 0) { $importance = "Low"; $badgecolor = "info"; };
        if($row['importance'] == 1) { $importance = "Mid"; $badgecolor = "success"; };
        if($row['importance'] == 2) { $importance = "High"; $badgecolor = "danger"; };
        
        $i++;
        
        ?>
        <!-- Modal -->
            <div class="modal fade" id="taskmodal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Task" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['title']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button><br>
                        </div>
                        <div class="modal-body">
                            <b>Info</b><br>
                            <?php echo $row['text']; ?>
                            <br>
                            <span class="small">Delivery date: <?php echo $newtodate; ?> at <?php echo $totime; ?> CEST</span>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small">Assigned to: 
                                        <?php 
                                        foreach($deworker as $value){
                                            $query2 = "SELECT * FROM member WHERE mem_id=$value";
                                            $result2 = mysqli_query($conn, $query2);
                                            $row2 = mysqli_fetch_assoc($result2); 
                                            echo "<img class='user-avatar rounded-circle' src='".$row2['avatar']."' width=35 title='".$row2['nickname']."'>";
                                        } ?>
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="small">Foreman: 
                                        <?php
                                        if(!empty($foreman))
                                        {
                                            $query3 = "SELECT * FROM member WHERE mem_id='$foreman'";

                                            $result3 = mysqli_query($conn, $query3);
                                            $row3 = mysqli_fetch_assoc($result3);

                                            echo "<img class='user-avatar rounded-circle' src='".$row3['avatar']."' width=35 title='".$row2['nickname']."'>";
                                        }
                                        else
                                        {
                                            echo "<span class='badge badge-danger'>No foreman assigned.</span>";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="small">Project Priority: <?php echo "<span class='badge badge-".$badgecolor."'>".$importance."</span>"; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="../assets/functions/mysql-functions.php?finishtask=1&taskid=<?php echo $row['id']; ?>&url=<?php echo $actual_link; ?>" class="btn btn-success">Finish project</a>
                            <a href="?page=tasks-edit&taskid=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php

    }
}
?>