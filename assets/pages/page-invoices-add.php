<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Invoices</h1>
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
                <strong class="card-title">Invoiceeditor</strong>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="../assets/functions/mysql-functions.php?add-invoice=1" method="POST">
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Issuer</h3>
                        <div class="form-group">
                            <input class="form-control" id="issuer" name="issuer" type="text" placeholder="Nacon Gaming, Eizo etc.">
                        </div>
                        
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Date and time</h3>
                        <div class="form-group row">
                          <div class="col-xs-3" style="margin-left: 15px;">
                            <input class="form-control" id="date" name="date" type="date" placeholder="YYYY-MM-DD">
                          </div>
                          <div class="col-xs-4" style="margin-left: 15px;">
                            <input class="form-control" id="time" name="time" type="time" placeholder="HH:MM">
                          </div>
                        </div>
                        <h3 class="lead" style="margin-bottom: 5px; margin-top: 10px;">Invoice File</h3>
                        <input class="form-control-file" type="file" name="uploaded_file">
                        <br>
                        <br>
                        <div class="container-login100-form-btn">
                            <input class="btn btn-info" type="submit" id="update-btn" name="submit" value="Save to draft"/>
                            <input class="btn btn-success" type="submit" id="update-btn" name="send" value="Send"/>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
