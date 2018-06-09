<?php
if (isset($_GET["logout"])) {
  session_unset();
  session_destroy();
  header("Location: index.php");
}
?>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index">Charles Salon</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="about">About</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="contact">Contact</a>
            </li>

            <?php
            if (!isset($_SESSION["user_id"])) {
              ?>
            
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="register">Register</a>
              </li>
              <?php
            } else {
            ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="store">Store</a>
            </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="?logout=true">Logout</a>
              </li>
            <?php
            }
            ?>

          </ul>
        </div>
      </div>
    </nav>