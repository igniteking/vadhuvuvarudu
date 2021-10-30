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
        $query = "SELECT * from admin WHERE admin_email = '$admin_email'";
        $result = mysqli_query($conn, $query);
      
        while ($rows = mysqli_fetch_assoc($result)) {
          $admin_id = $rows['id'];
          $admin_name = $rows['admin_name'];
          $admin_email = $rows['admin_email'];
        }
    ?>
    <title>Profile - GlowEdu</title>
    <meta charset="utf-8">
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
                <button type="button" id="sidebarCollapse" class="btn btn-primary" style="background-color: #000;">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
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
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_POST['save_profile'])) {
            $admin_name = $_POST['admin_name'];
            $sql = "UPDATE `admin` SET `admin_name`='$admin_name' WHERE admin_email='$admin_email'";
            $rt = mysqli_query($conn, $sql);
            if ($rt) {
                echo "Done!";
            } else {
                echo "<h1> ERROR!</h1> ";
            }
        }

        ?>
        <h2 class="" style="float: left;">Edit Profile!</h2><a href="report.php" target="_blank"><button type="button" onclick="showAlert()" style="display: none; float: right;" class="btn btn-outline-danger float-right"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report</button></a>
        <br>
        <div class="container rounded bg-white mt-5 mb-5" style="border: 2px solid black; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <div class="row">
                <div class="col-md-3 border-right">
<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' width='150px' src='images/user.png'><br><span class='font-weight-bold'><?php echo $admin_name?></span><span class='text-black-50'><?php echo $admin_email?></span></div>
                </div>
                <div class="col-md-9">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form method="post" action="profile.php?admin_email=<?php echo $admin_email; ?>">
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Full Name</label><input type="text" name="admin_name" class="form-control" placeholder="Your name" value="<?php echo $admin_name ?>"></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">E-mail</label><input type="text" name="email" class="form-control" placeholder="Your name" value="<?php echo $admin_email ?>" disabled></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save_profile" value="Update">Save Profile</button></div>
                    </div>
                </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <style>body {
    background: rgb(222,171,255);
background: linear-gradient(90deg, rgba(222,171,255,1) 0%, rgba(191,202,255,1) 51%, rgba(172,220,255,1) 100%);
}</style>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function() {
            $("#resend_disable").attr("disabled", "disabled");
            setTimeout(function() {
                $("button").removeAttr("disabled");
            }, 10000);
        });
    </script>
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</body>

</html>