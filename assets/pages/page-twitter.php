    <?php
        require_once '../assets/functions/OAuth.php';
        require_once '../assets/functions/Twitter.php';
        include ('../assets/functions/twitter-include.php');

        $consumerKey = "rkgLS787kkqY65hzmlMZAGMWM";
        $consumerSecret = "Fb6TwSiuLYOHiWnYmKwshz04UWnsuKy7VuLg9ZSAFKilXluebt";
        $accessToken = "3899323943-O26XHpK6a2uxKkptHsHBhLVrcBF6CRMXuZAJhxf";
        $accessTokenSecret = "qp2t6xHzEpl6wQFXQNrb5ky8AoPjeloJm1Ffc28yvERHa";

        $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

        $statuses = $twitter->load(Twitter::ME);
        $mentions = $twitter->load(Twitter::REPLIES);
    ?>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Twitter</h1>
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
            <div class="twt-feed blue-bg">
                <div class="corner-ribon black-ribon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="fa fa-twitter wtt-mark"></div>

                <div class="media">
                    <a href="#">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="https://pbs.twimg.com/profile_images/1005432348006146048/dEMbPoqR_400x400.jpg">
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
                            Tweets
                        </li>
                        <li>
                            <h5><?php echo $friends; ?></h5>
                            Following
                        </li>
                        <li>
                            <h5><?php echo $followers; ?></h5>
                            Followers
                        </li>
                    </ul>
                </div>
                <form>
                    <div class="twt-write col-sm-12" style="margin-bottom: 1%;">
                        <textarea placeholder="Write your Tweet and Enter" rows="2" class="form-control t-text-area" disabled></textarea>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Follower Development </h4>
                    <br>
                    <div id="chart-container">FusionCharts will render here</div>
                </div>
            </div>
        </div><!-- /# column -->
        <div class="col-sm-12">
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
                        foreach ($mentions as $status) 
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
                            if (++$i == 4) break;
                        }    
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12">
                            <h4 class="card-title mb-0">Latest tweets</h4>
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
                            if (++$i == 4) break;
                        }    
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>