<?php 
if (isset($_GET["logout"])) {
    session_unset();
	session_destroy();
	header("Location: index.php");
}
?>
		<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard">Charles Salon</a>

                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="?logout=true">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>