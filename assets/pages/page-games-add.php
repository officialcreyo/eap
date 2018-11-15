<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Games</h1>
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
                <strong class="card-title">Gameeditor</strong>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?add-game=1" method="post">

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Name</h3>
                        <div class="form-group">
                            <input class="form-control" id="name" name="name" type="text" placeholder="e.g. League of Legends" required>
                        </div>

                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Identifier</h3>
                        <div class="form-group">
                            <input class="form-control" id="ident" name="ident" type="text" placeholder="e.g. leagueoflegends" required>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info btn-lg btn-block" type="submit" id="update-btn" name="submit" value="Create"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>