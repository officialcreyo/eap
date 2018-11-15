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
                        <h4 class="card-title mb-0">Add new reporting</h4>
                    </div>
                </div>
                <hr>
                <div>
                    <form enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?add-reporting=1" method="post"> 
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $mem_id;?>">
                        </div>
                        <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Title</h4>
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="e.g. CWL Anaheim 2018">
                        </div>
                        
                        <h4 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Date</h4>
                        <div class="form-group">
                            <input class="form-control" id="date" name="date" type="date" placeholder="e.g. 2018-06-20">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 0px;">League <span class="text-muted small">(If neccessary)</span></h3>
                        <div class="form-group">
                            <select class="form-control" id="league" name="league">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM events WHERE deleted='0' ORDER BY name";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Text</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="text" name="text" rows="5" placeholder="Place a detailed description."></textarea>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Additional File</h3>
                        <input class="form-control-file" type="file" name="uploaded_file" required>
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