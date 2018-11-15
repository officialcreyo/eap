<?php if($_GET['welcome'] == 1) { ?>
<div class="col-sm-12">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Hello <?php echo $_SESSION['nickname']; ?>!</h4>
        <p>Welcome to our new control panel, simply called PAPi, or if you like it the long way (Team) Prismatic Administration Panel improved.</p>
        <hr>
        <p class="mb-0">Look around and discover nice things!</p>
    </div>
</div>
<?php } ?>