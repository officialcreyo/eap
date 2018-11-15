<?php
    $accountid = $_GET['accountid'];
?>

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
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Accounteditor</strong>
            </div>
            <div class="card-body">
                <?php
                             
                $query = "SELECT * FROM member WHERE mem_id='$accountid'";
                
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                
                $username=$row['username'];
                $nickname=$row['nickname'];
                $vorname=$row['firstname'];
                $nachname=$row['lastname'];
                $city=$row['city'];
                $plz=$row['plz'];
                $avatar=$row['avatar'];
                $street=$row['street'];
                $streetno=$row['streetno'];
                $country=$row['country'];
                $facebook=$row['facebook'];
                $phonenumber=$row['phoneno'];
                $twitter=$row['twitter'];
                $role=$row['role'];
                $email=$row['email'];
                $department=$row['department'];
                
                ?>
                <!---------------------------------HTML+PHP----------------------------------------->
                
                    <form name="creatematch" enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?update-user=1" method="post">
                    <div class="col-sm-8">
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Username</h3>
                        <div class="form-group">
                            <input class="form-control" id="username" name="username" type="text" value="<?php echo $username; ?>" disabled>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Nickname</h3>
                        <div class="form-group">
                            <input class="form-control" id="nickname" name="nickname" type="text" value="<?php echo $nickname; ?>" required>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Email</h3>
                        <div class="form-group">
                            <input class="form-control" id="email" name="email" type="text" value="<?php echo $email; ?>" required>
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">New password</h3>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" type="password">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px;">Role</h3>
                        <div class="form-group">
                            <select class="form-control" id="role" name="role">
                                <?php if($role == 1) {
                                    $select1 = "selected='selected'";
                                }
                                else if($role == 2) {
                                    $select2 = "selected='selected'";
                                }
                                else if($role == 5) {
                                    $select3 = "selected='selected'";
                                } ?>
                                <option value="0">User</option>
                                <option value="1" <?php echo $select1; ?>>Moderator</option>
                                <option value="2" <?php echo $select2; ?>>Moderator</option>
                                <option value="5" <?php echo $select3; ?>>Superadmin</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="hidden" value="<?php echo $accountid;?>">
                        </div><br>

                        <div class="container-login100-form-btn">
                            <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Update"/>
                            <input class="btn btn-danger" type="submit" id="update-btn" name="reset" value="Remove"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Avatar</h3>
                        <img src="<?php echo $avatar; ?>" height="150">
                        <br><br>
                        <input class="form-control-file" style="margin-top:0.5%;" type="file" name="uploaded_file">
                    </div>
                    </div>
                </div>
                <div class="card">
                <div class="card-header">
                    <strong class="card-title">Details</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">First name, Last name</h3>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input class="form-control" id="vorname" name="vorname" type="text" placeholder="First name" value="<?php echo $vorname; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" id="nachname" name="nachname" type="text" placeholder="Last name" value="<?php echo $nachname; ?>" required>
                                </div>
                            </div>
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Street and number</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input class="form-control" id="street" name="street" type="text" placeholder="Street name" value="<?php echo $street; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" id="streetno" name="streetno" type="text" placeholder="Street number" value="<?php echo $streetno; ?>">
                                    </div>
                                </div>
                            </div>

                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">City</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input class="form-control" id="plz" name="plz" type="text" placeholder="Postcode" value="<?php echo $plz; ?>">
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="stadt" name="stadt" type="text" placeholder="City" value="<?php echo $city; ?>">
                                    </div>
                                </div>
                            </div>

                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Country</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="country" name="country" type="text" placeholder="Country" value="<?php echo $country; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Department</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="department" name="department" type="text" placeholder="Department" value="<?php echo $department; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Phone number</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="phonenumber" name="phonenumber" type="text" placeholder="Phone number" value="<?php echo $phonenumber; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Twitter <i class="fa fa-twitter"></i></h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="twitter" name="twitter" type="text" placeholder="Twitter @" value="<?php echo $twitter; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Facebook <i class="fa fa-facebook"></i></h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="facebook" name="facebook" type="text" placeholder="Facebook @" value="<?php echo $facebook; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Update"/>
                        <input class="btn btn-danger" type="submit" id="update-btn" name="reset" value="Remove"/>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>
