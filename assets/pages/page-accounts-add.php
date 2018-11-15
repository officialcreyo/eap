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
                    <li class="active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Accountcreator</strong>
            </div>
            <div class="card-body">
                <form name="creatematch" action="../assets/functions/mysql-functions.php?add-user=1" method="post">
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Username</h3>
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Username" required>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 0px;">Nickname</h3>
                        <div class="form-group">
                            <input class="form-control" id="nickname" name="nickname" type="text" placeholder="Nickname..." required>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Email</h3>
                        <div class="form-group">
                            <input class="form-control" id="email" name="email" type="email" placeholder="e.g. name@xyz.com" required>
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Password</h3>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" type="text" placeholder="e.g. eistee1337" required>
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px;">Role</h3>
                        <div class="form-group">
                            <select class="form-control" id="role" name="role">
                                <option value="0">User</option>
                                <option value="1">Moderator</option>
                                <option value="5">Superadmin</option>
                            </select>
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
                                    <input class="form-control" id="vorname" name="vorname" type="text" placeholder="First name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" id="nachname" name="nachname" type="text" placeholder="Last name" required>
                                </div>
                            </div>
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Street and number</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input class="form-control" id="street" name="street" type="text" placeholder="Street name">
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" id="streetno" name="streetno" type="text" placeholder="Street number" >
                                    </div>
                                </div>
                            </div>

                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">City</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input class="form-control" id="plz" name="plz" type="text" placeholder="Postcode" >
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" id="stadt" name="stadt" type="text" placeholder="City">
                                    </div>
                                </div>
                            </div>

                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Country</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="country" name="country" type="text" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Department</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="department" name="department" type="text" placeholder="Department">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Phone number</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="phonenumber" name="phonenumber" type="text" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Twitter <i class="fa fa-twitter"></i></h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="twitter" name="twitter" type="text" placeholder="Twitter @">
                                    </div>
                                </div>
                            </div>
                            
                            <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Facebook <i class="fa fa-facebook"></i></h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="facebook" name="facebook" type="text" placeholder="Facebook @">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <input class="btn btn-info btn-lg btn-block" type="submit" id="update-btn" name="submit" value="Create"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
