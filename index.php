<?php include 'shared/header.php'; ?>

  <body id="page-top">

    <!-- Navigation -->
    <?php include 'shared/nav.php'; ?>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Salon!</div>
          <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
          <?php if (!isset($_SESSION["user_id"])) {
              ?>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="login.php">Shop Now</a>
          <?php
            } else {
            ?>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="store.php">Shop Now</a>
            <?php
            }
            ?>
        </div>
      </div>
    </header>

    <!-- Footer -->
    <?php include 'shared/footer.php'; ?>