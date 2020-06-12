<nav class="navbar navbar-default" role="navigation" style="background: #5f4c4c;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse">
        <div class="container">
            <ul class="headerNav nav navbar-nav " style=" float: right;">
                <li class=""><a>Hi...<?php echo $_SESSION['username']; ?></a></li>
                <li class=""><a href="<?php echo url()."/common/logout.php";?>">Logout</a></li>

            </ul>
        </div>
    </div>
</nav>