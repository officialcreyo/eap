<?php
    include ('facebook-include');
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Facebook</h1>
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
        <section class="card">
        <div class="twt-feed fb-bg">
            <div class="corner-ribon black-ribon">
                <i class="fa fa-facebook"></i>
            </div>
            <div class="fa fa-facebook wtt-mark"></div>

            <div class="media">
                <a href="#">
                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="https://pbs.twimg.com/profile_images/988727529304461312/zoz9BaAC_400x400.jpg">
                </a>
                <div class="media-body">
                    <h2 class="text-white display-6">Team Prismatic</h2>
                    <p class="text-light">Professional eSports Organisation based in Germany. #bluewave 🌊</p>
                </div>
            </div>



            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h5><?php echo $statuses1; ?></h5>
                        Posts
                    </li>
                    <li>
                        <h5><?php echo $friends; ?></h5>
                        Liked pages
                    </li>
                    <li>
                        <h5><?php echo $followers; ?></h5>
                        Likes
                    </li>
                </ul>
            </div>
            <form>
                <div class="twt-write col-sm-12" style="margin-bottom: 1%;">
                    <textarea placeholder="Write your message and Enter" rows="2" class="form-control t-text-area" disabled></textarea>
                </div>
                <footer class="twt-footer">
                    <a href="#"><i class="fa fa-camera"></i></a>
                    <span class="pull-right">
                        280
                    </span>
                </footer>
            </form>
        </section>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-12">
                        <h4 class="card-title mb-0">Latest mentions</h4>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                    <?php
                    $i = 0;
                    foreach ($statuses as $status) 
                    {
                        echo "<div class='col-sm-12'>";
                        echo "<div class='feed-box'>";
                        echo "<div class='card'>";
                        echo "<div class='card-body'>";
                        echo "<div class='corner-ribon blue-ribon'>";
                        echo "<i class='fa fa-twitter'></i>";
                        echo "</div>";
                        echo "<h4>" , $status->user->name;
                        echo "<div class='small text-muted'>" , $status->created_at;
                        echo "</div>";
                        echo "<br>";
                        echo "</h4>";
                        echo "", Twitter::clickable($status);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        if (++$i == 6) break;
                    }    
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>