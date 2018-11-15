<?php
    $profilid = $_GET['id'];
    if(empty($profilid)) { $profilid = $mem_id; }

    $query = "SELECT * FROM member WHERE mem_id='$profilid'";
                
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Profile</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><?php if (empty($row['nickname'])) { echo $row['username']; } else { echo $row['nickname']; } ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card - <?php echo $row['nickname']; ?></strong><?php if($mem_role >= 2) { ?><a class="float-sm-right" href="/app/?page=accounts-edit&accountid=<?php echo $profilid; ?>"><i class="fa fa-cog"></i> Edit</a><?php } ?>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="<?php echo $row['avatar']; ?>" height="150" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row['firstname']; echo " "; echo $row['lastname']; ?></h5>
                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $row['city']; ?>, <?php echo $row['country']; ?></div>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <?php if(!empty($row['facebook'])) { ?><a href="https://facebook.com/<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook pr-1"></i></a> <?php } ?>
                    <?php if(!empty($row['twitter'])) { ?><a href="https://twitter.com/<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter pr-1"></i></a> <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($mem_role >= 2) { ?>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i><strong class="card-title pl-2">Detailed information</strong><?php if($mem_role >= 2) { ?><a class="float-sm-right" href="/app/?page=accounts-edit&accountid=<?php echo $profilid; ?>"><i class="fa fa-cog"></i> Edit</a><?php } ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 "> 
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Last activity:</td>
                            <td><?php echo $row['activitydate_at']; ?> at <?php echo $row['activitytime_at']; ?> CEST</td>
                          </tr>
                          <tr>
                            <td>Department:</td>
                            <td><?php echo $row['department']; ?></td>
                          </tr>
                          <tr>
                            <td>Hire date:</td>
                            <td><?php echo $row['hiredate']; ?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-6 "> 
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Date of Birth</td>
                            <td><?php echo $row['birthdate']; ?></td>
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <td><?php echo $row['gender']; ?></td>
                          </tr>
                          <tr>
                            <td>Home Address</td>
                            <td><?php echo $row['street']; echo ", "; echo $row['streetno']; ?></td>
                          </tr>
                            <tr>
                            <td>Country</td>
                            <td><?php echo $row['country']; ?></td>
                          </tr>
                            <td>Phone Number</td>
                            <td><?php echo $row['phoneno']; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>