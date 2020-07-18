<div class="col-sm-3 col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Dashboard
        </div>
        <div class="panel-body">
            <div class="msgimg">
                <?php if (!$pic) {  ?>
                    <img src="./static/images/img_avatar.png" style=" width: 100px;">
                <?php } else {  ?>
                    <img src="<?php echo "../".$pic; ?>" style=" width: 100px;">
                <?php } ?>
            </div>
            <ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
                <li class="active"><a href="userindex.php">Home</a></li>
                <li><a href="counsellstage1.php">Apply for Counselling</a></li>
                <li><a href="checkstatus.php">Check Status</a></li>
                <li><a href="feesubmission.php">Fee Submission</a></li>
                <li><a href="changepassword.php">Change Password</a></li>
                <li><a href="<?php echo url()."/common/logout.php"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>

</div>