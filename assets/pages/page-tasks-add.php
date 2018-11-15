<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tasks</h1>
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
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="card-title mb-0">Add new task</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <form action="../assets/functions/mysql-functions.php?add-task=1" method="post"> 
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $mem_id;?>">
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Title</h4>
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="e.g. Stream design">
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Due date</h4>
                        <div class="form-group">
                            <input class="form-control" id="date" name="date" type="date" placeholder="e.g. 2018-05-16">
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px;">Importance</h4>
                        <div class="form-group">
                            <select class="form-control" id="importance" name="importance">
                                <option value="0">Low</option>
                                <option value="1">Medium</option>
                                <option value="2">Heigh</option>
                            </select>
                        </div>
                        <script type="text/javascript">
                            jQuery(function ($) { $(".select2").select2(); });
                        </script>
                        <h4 class="lead" style="margin-bottom: 5px;">Worker</h4>
                        <div class="form-group">
                            <select class="select2 form-control" id="worker" name="worker[]" multiple="">
                                <?php
                                $sql = "SELECT * FROM member WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['mem_id']."'>".$row['username']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px;">Project edited by</h4>
                        <div class="form-group">
                            <select class="form-control" id="projectedited" name="projectedited">
                                <option value="0"></option>
                                <?php
                                $sql = "SELECT * FROM member WHERE deleted='0'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['mem_id']."'>".$row['username']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Description</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="detail" name="detail" rows="5" placeholder="Place a detailed description."></textarea>
                        </div>
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