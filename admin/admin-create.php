<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
  <?php
  if (isset($_SESSION['email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}
?>
  	<title>Upload - GlowEdu</title>
    <meta charset="utf-8">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
  </head>
  <body>
  <div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
      <img src="images/logo.png" width ="40px">
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
      </ul>
    </div>
  </div>
</nav>

<?php
$reg = @$_POST['reg'];
$admin_name = strip_tags(@$_POST['admin_name']);
$admin_email = strip_tags(@$_POST['admin_email']);
$admin_password = strip_tags(@$_POST['admin_password']);
$r_pswd = strip_tags(@$_POST['repeat-password']);
$date = date("Y-m-d");
$vkey = md5(time() . $admin_name);
if ($reg) {
    if($admin_name && $admin_email && $admin_password && $r_pswd) {
        $user_check = "SELECT admin_name from admin WHERE admin_name='$admin_name'";
        $result = mysqli_query($conn, $user_check);
        $result_check = mysqli_num_rows($result);
        if (!$result_check > 0) {
            if ($admin_password == $r_pswd) {
                                $hashedPwd = password_hash($admin_password, PASSWORD_DEFAULT);
                                mysqli_query($conn, "INSERT INTO admin(`id`, `admin_name`, `admin_email`, `admin_password`) VALUES (NULL, '$admin_name','$admin_email','$admin_password')");
                            }
            } else {
                echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Both Password's Dont Match!</f>
        </center></div>";
            }
        } else {
            echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Username already exist!</f>
        </center></div>";
        }
    } else {
        echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Please Fill In All Fields!</f>
        </center></div>";
    }
?>


<div class="one" style="margin-top: 3%;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Insert Admin Details</h2>
                        <form method="POST" action='admin-create.php' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="admin_name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="admin_email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="admin_password" id="pass" placeholder="Password"/>
                            </div>
                            <span>Password should contain atleast one Upper case letter </span><br>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat-password" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="reg" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
            </div>
            </section>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>