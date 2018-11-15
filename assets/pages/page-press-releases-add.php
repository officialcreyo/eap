<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Press releases</h1>
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
                <strong class="card-title">Press release editor</strong>
            </div>
            <div class="card-body">
                <form name="creatematch" action="../assets/functions/mysql-functions.php?add-press=1" method="post">

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD">
                          </div>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Author</h3>
                        <div class="form-group">
                            <input class="form-control" id="author" name="author" type="text" placeholder="e.g. 99Damage, Dexerto">
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Title</h3>
                        <div class="form-group">
                            <input class="form-control" id="title" name="title" type="text" placeholder="e.g. 99Damage, Dexerto">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Excerp</h3>
                        <div class="form-group">
                            <textarea class="form-control" id="excerp" name="excerp" rows="3" placeholder="Place a short excerp (20-30 words)"></textarea>
                        </div>
                    
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">URL</h3>
                        <div class="form-group">
                            <input class="form-control" id="url" name="url" type="url" placeholder="e.g. 99damage.de/article/xyz">
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
