<?php include_once("database/phpmyadmin/header.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <?php
    if (isset($_SESSION['admin_email'])) {
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
    <link rel="stylesheet" href="style/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                            <img src="images/main.png" width="40px">
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
        if ($reg) {
            if ($admin_name && $admin_email && $admin_password && $r_pswd) {
                $user_check = "SELECT admin_name from admin WHERE admin_name='$admin_name'";
                $result = mysqli_query($conn, $user_check);
                $result_check = mysqli_num_rows($result);
                if (!$result_check > 0) {
                    if ($admin_password == $r_pswd) {
                        $hashedPwd = password_hash($admin_password, PASSWORD_DEFAULT);
                        mysqli_query($conn, "INSERT INTO `admin`(`id`, `admin_name`, `admin_email`, `admin_password`) VALUES (NULL,'$admin_name','$admin_email','$admin_password')");
                        echo "<div class='error-styler'><center>
                        <f style='padding-top: 10px; padding-bottom: 10px;'>Admin Profile Created!</f>
                        </center></div>";
                } else {
                    echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Both Password's Dont Match!</f>
        </center></div>";
                }
            } else {
                echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Admin already exist!</f>
        </center></div>";
            }
        } else {
            echo "<div class='error-styler'><center>
        <f style='padding-top: 10px; padding-bottom: 10px;'>Please Fill In All Fields!</f>
        </center></div>";
        }}
        ?>
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                            <form class="mx-1 mx-md-4" method="POST" action="admin-create.php">

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="text" name="admin_name" id="form3Example1c" class="form-control" />
                                        <label class="form-label" for="form3Example1c">Admin Name</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="email" name="admin_email"id="form3Example3c" class="form-control" />
                                        <label class="form-label" for="form3Example3c">Admin Email</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="password" name="admin_password" id="form3form3Example4c" class="form-control" />
                                        <label class="form-label" for="form3Example4c">Password</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="password" name="repeat-password" id="form3form3Example4c" class="form-control" />
                                        <label class="form-label" for="form3Example4c">Password</label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <input type="submit" name='reg' class="btn btn-primary btn-lg">
                                </div>

                            </form>

                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                            <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

                        </div>
                    </div>
                </div>
            </div>
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