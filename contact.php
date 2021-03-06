<?php 
include 'repository/contact.php';
include 'shared/header.php'; 
?>

  <body id="page-top">

    <!-- Navigation -->
    <?php include 'shared/nav.php'; ?>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $name = strip_tags(htmlspecialchars($_POST['name']));
              $email_address = strip_tags(htmlspecialchars($_POST['email']));
              $phone = strip_tags(htmlspecialchars($_POST['phone']));
              $message = strip_tags(htmlspecialchars($_POST['message']));
              
              $email_subject = "Website Contact Form:  $name";
              $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

              $compose = [
                'name' => $name,
                'subject' => $email_subject,
                'body' => $email_body,
                'date' => date("M/d/Y h:i A")
              ];

              sentmessage($compose);  


            }
            ?>

            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="<?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?>" required="required" data-validation-required-message="Please enter your name." name="name" value="<?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?>">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="<?php echo $_SESSION["email"]; ?>" required="required" data-validation-required-message="Please enter your email address." name="email" value="<?php echo $_SESSION["email"]; ?>">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." name="phone">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message." name="message"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button value="submit" class="btn btn-primary btn-xl text-uppercase">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <?php include 'shared/footer.php'; ?>