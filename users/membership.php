<?php include_once("database/phpmyadmin/header.php"); ?>
<!doctype html>
<html lang="en">

<head>
  <?php
  if (isset($_SESSION['email'])) {
  } else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
  }
  ?>
  <?php
  $query = "SELECT * from users WHERE email = '" . $_SESSION['email'] . "'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $id = $rows['id'];
    $user = $rows['username'];
    $email = $rows['email'];
    $mobile = $rows['mobile'];
    $gender = $rows['gender'];
    $profession = $rows['profession'];
    $active = $rows['active'];
    if ($active == 1) {
      $active = "active";
      $dialog = "";
    } else {
      $active = "Verify Your Email!";
      $dialog = "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>$active <a href='resend.php?id=$id' style='color: #eee'><u>Resend Verification Code!</u></a></p>";
    }
    $bio = $rows['bio'];
    $state = $rows['state'];
    $city = $rows['city'];
    $country = $rows['country'];
  }
  ?>
  <title>Membership! - Vadhuvuvarudu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/css/css/style.css">
  <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

</head>

<body>
  <div class="un-blur"></div>
  <div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-primary" style="background-color: #000;">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <img src="images/logo.png" width="40px">
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <div class="input-group">
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <style>
      .un-blur {
        /* this is needed or the background will be offset by a few pixels at the top */
        overflow: auto;
        position: relative;
      }

      .un-blur::before {
        content: "";
        position: fixed;
        left: 0;
        right: 0;
        z-index: -1;
        display: block;
        background-image: url('images/image2.jpg');
        background-size: cover;
        width: 100%;
        height: 100%;
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
      }

      .collapsible_python {
        background-color: #fff;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        color: #000;
      }

      .collapsible_python:hover {
        background-color: #000;
        color: white;
      }

      .active1 {
        background-color: #000;
        color: white;
      }

      .content5 {
        padding: 20px;
        display: none;
        overflow: hidden;
        background-color: #d9d9d9;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
      }

      #beauty-boxes2 {
        transition: all 0.5s ease;
        position: relative;
        float: left;
        width: 100%;
        padding: 2px;
        margin: 20px;
        background: #fff;
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0), 0 0 40px rgba(0, 0, 0, 0) inset;
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0) inset;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0) inset;
        -moz-border-radius: 4px;
        border-radius: 10px;
      }

      #beauty-boxes2:before,
      #beauty-boxes2:after {
        content: "";
        position: absolute;
        z-index: -3;
        bottom: 15px;
        left: 12px;
        width: 100%;
        height: 20%;
        max-width: 350px;
        max-height: 90px;
        -webkit-box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);
        -moz-box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);
        box-shadow: 0 15px 10px rgba(0, 0, 0, 0.7);
        -webkit-transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        -o-transform: rotate(-3deg);
        transform: rotate(-3deg);
      }


      #beauty-boxes2:after {
        right: 10px;
        left: auto;
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        transform: rotate(3deg);
      }

      .beauty-boxes2 p {
        font-size: 16px;
        font-weight: bold;
      }


      #beauty-boxes2:hover {
        color: #000;
      }

      @media only screen and (max-width: 600px) {
        #beauty-boxes {
          margin: 10px;
        }
      }
    </style>
    <div class="row mt-12">
      <h2 class="col-md-4" id="subhead" style="color: white;">Package Data!</h2>
    </div>
    <div class="row mt-12">
      <div id="beauty-boxes2">
        <div style="padding: 20px;"> <button type="button" style="margin-top: 20px" class="collapsible_python">1 month trial (Free):</button>
          <div class="content5">
            <p>Skeptical about registering on Vadhuvu Varudu? Take a tour of the website and enjoy one month of surfing free of cost!</p>
            <center>
              <a href="payment/payment_1.php"><button type="button" class="custom_btn_zee">Get Free Subscription!</button></a>
            </center>
          </div>

          <button type="button" class="collapsible_python">3 months package (Rs. 2000):</button>
          <div class="content5">
            <p>Enjoy 3 months of access to everything that Vadhuvu Varudu has to offer! </p>
            <center>
              <form>
                <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_I9WBhETldHApcE" async> </script>
              </form>
            </center>
          </div>
          <button type="button" class="collapsible_python">6 months package (Rs. 3000):</button>
          <div class="content5">
            <p>Enjoy 6 months of access to everything that Vadhuvu Varudu has to offer!</p>
            <center>
              <form>
                <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_I9WDTyqsJ4ATrN" async> </script>
              </form>
            </center>
          </div>
          <button type="button" class="collapsible_python">12 months package (Rs. 6000):</button>
          <div class="content5">
            <p>Enjoy 12 months of access to everything that Vadhuvu Varudu has to offer!</p>
            <center>
              <form>
                <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_I9WExAvVBneakp" async> </script>
              </form>
            </center>
          </div>

          <script>
            var coll = document.getElementsByClassName("collapsible_python");
            var i;

            for (i = 0; i < coll.length; i++) {
              coll[i].addEventListener("click", function() {
                this.classList.toggle("active1");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                  content.style.display = "none";
                } else {
                  content.style.display = "block";
                }
              });
            }
          </script>

        </div>
      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
</body>

</html>