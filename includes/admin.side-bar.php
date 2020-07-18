<div class="col-sm-3 col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Dashboard- Admin
        </div>
        <div class="panel-body">
            <div class="msgimg">
                <img src="./static/images/img_avatar.png" style=" width: 100px;">
            </div>
            <ul class="nav nav-pills nav-stacked" role="tablist" style="padding-top: 10px; display: block;">
                <li class="active"><a href="adminindex.php">Home</a></li>
                <li><a href="createuser.php">Create User</a></li>
                <li><a href="updateuser.php">Update User</a></li>
                <li><a href="deleteuser.php">Delete User</a></li>
                <li><a href="grievanceprint.php">Grievance</a></li>
                <li><a href="complaintprint.php">Complaint</a></li>
                <li><a href="openadmission.php">Open Admission</a></li>
                <li><a href="closeadmission.php">Close Admission</a></li>
                <li><a href="adminchangepassword.php">Change Password</a></li>
                <li><a href="<?php echo url()."/logout.php"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>

</div>