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
        // if ($active == 1) {
        //     $active = "active";
        //     $dialog = "";
        // } else {
        //     $active = "Verify Your Email!";
        //     $dialog = "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>$active <a href='resend.php?id=$id' style='color: #eee'><u>Resend Verification Code!</u></a></p>";
        // }
        $bio = $rows['bio'];
        $state = $rows['state'];
        $city = $rows['city'];
        $country = $rows['country'];
    }
    ?>
    <title>Dashboard - Vadhuvuvarudu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="style/css/css/style.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
        <div class="carousel" data-flickity='{ "autoPlay": true, "wrapAround": true }'>

            <?php
            $query = "SELECT * from users WHERE gender != '$gender'";
            $result = mysqli_query($conn, $query);

            while ($rows = mysqli_fetch_assoc($result)) {
                $profileid = $rows['id'];
                $profileusername = $rows['username'];
                $profileemail = $rows['email'];
                $profilemobile = $rows['mobile'];
                $profilegender = $rows['gender'];
                $profileprofession = $rows['profession'];
                $profileactive = $rows['active'];
                $profilebio = $rows['bio'];
                $profilehobbies = $rows['hobbies'];
                $profilestate = $rows['state'];
                $profilecity = $rows['city'];
                $profilecountry = $rows['country'];
                echo "
<div class='carousel-cell'>
 <div style='padding: 20px;'>";
                $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$profileemail'");
                $get_pic_row = mysqli_fetch_assoc($check_pic);
                $profile_pic_db = $get_pic_row['profile_pic'];
                if ($profile_pic_db == "") {
                    $profile_pic2 = "";
                    if ($profilegender == "male") {
                        echo "<img class='img-radius' alt='User-Profile-Image' style='cursor: zoom-in border-radius: 10px;' height='100px' src='images/male.png'><br><br>";
                    } else {
                        echo "<img class='img-radius' alt='User-Profile-Image' style='cursor: zoom-in border-radius: 10px;' height='100px' src='images/female.png'><br><br>";
                    }
                } else {
                    $profile_pic2 = "userdata/" . $profile_pic_db;
                    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
                <img data-enlargeable class='img-radius' alt='User-Profile-Image' style='cursor: zoom-in; border-radius: 10px;' width='100px' height='100px' src='$profile_pic2'><br><br>";
                }
                echo "
  <h5 style='text-transform: capitalize;'>$profileusername || $profilegender </h5>
       State : $profilestate<br>
  HOBBIES : $profilehobbies <br> PROFESSION : $profileprofession<br>
</div>"; ?>
            <?php
                $payment_selectioni_query_python = "SELECT * FROM `payments` WHERE email = '$email'";
                $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
                $row_count = mysqli_num_rows($payment_selectioni_result_python);
                if ($row_count > 0) {
                    echo "<form method='POST' action='index.php'>
<input type='submit' value='Request' name='request_btn' style='width: 70%; height: 50px; border: 2px solid blue; background-color: white; border-radius:10px; color: blue; font-size: 19px; font-weight: 400'><br><br>
</form>
</div>";
                } else {
                    echo "<a href='membership.php'><button style='width: 70%; height: 50px; border: 2px solid red; background-color: white; border-radius:10px; color: red; font-size: 19px; font-weight: 400'>Buy Membership</button></a><br><br></div>";
                }
            }
            ?>
            <?php
            $request_btn = @$_POST['request_btn'];
            if ($request_btn) {
                $date = date("Y/m/d");
                $request_query123 = "INSERT INTO `request`(`id`, `user_from`, `user_to`, `subject`, `date`) VALUES (NULL , '$user_id', '$profileid', 'pending', '$date')";
                $request_result123 = mysqli_query($conn, $request_query123);
                if ($request_result123) {
                    echo "Request Sent!";
                } else {
                    echo "Request Not Sent!";
                }
            }
            ?>
            <script>
                $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
                    var src = $(this).attr('src');
                    var modal;

                    function removeModal() {
                        modal.remove();
                        $('body').off('keyup.modal-close');
                    }
                    modal = $('<div>').css({
                        background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                        backgroundSize: 'contain',
                        width: '100%',
                        height: '100%',
                        position: 'fixed',
                        zIndex: '10000',
                        top: '0',
                        left: '0',
                        cursor: 'zoom-out'
                    }).click(function() {
                        removeModal();
                    }).appendTo('body');
                    //handling ESC
                    $('body').on('keyup.modal-close', function(e) {
                        if (e.key === 'Escape') {
                            removeModal();
                        }
                    });
                });
            </script>

        </div>
        <br><br>
        <h2 class='mb-4' style='color: white;'>Hi! <?php echo $user; ?></h2>

        <div class="container emp-profile" style="border: 2px dotted black;">
            <form method="post" style="padding: 20px; border: 2px solid black;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php
                            $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$email'");
                            $get_pic_row = mysqli_fetch_assoc($check_pic);
                            $profile_pic_db = $get_pic_row['profile_pic'];
                            if ($profile_pic_db == "") {
                                $profile_pic2 = "";
                                echo "<img class='img-radius' alt='User-Profile-Image' src='images/user.png'>";
                            } else {
                                $profile_pic2 = "userdata/" . $profile_pic_db;
                                echo "<img src='$profile_pic2' class='img-radius' alt='User-Profile-Image'>";
                            }
                            ?>

                            <a href="profile.php">
                                <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="button" name="file" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                <?php echo $user; ?>
                            </h5>
                            <h6>
                                <?php echo $gender ?> || <?php //echo $active; ?>
                            </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Extras</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="profile.php"><input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" /></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Web Links</p>
                            <a href="about.php">About Us</a><br />
                            <a href="contact.php">Contact Us</a><br />
                            <a href="tandc.php">Terms and Conditions</a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $email; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php
                                            if ($mobile == "") {
                                                echo "<spam style='color: red;'>Mobile Number not Verified</spam>";
                                            } else {
                                                echo $mobile;
                                            } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bio</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $bio; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Country</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $country; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>State</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $state; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>City</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $city; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $profession; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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

            .emp-profile {
                padding: 3%;
                margin-top: 3%;
                margin-bottom: 3%;
                background: #fff;
            }

            .profile-img {
                text-align: center;
            }

            .profile-img img {
                width: 70%;
                height: 100%;
            }

            .profile-img .file {
                position: relative;
                overflow: hidden;
                margin-top: -20%;
                width: 70%;
                font-size: 15px;
                background: #212529b8;
            }

            .profile-img .file input {
                position: absolute;
                opacity: 0;
                right: 0;
                top: 0;
            }

            .profile-head h5 {
                color: #333;
            }

            .profile-head h6 {
                color: #0062cc;
            }

            .profile-edit-btn {
                border: none;
                border-radius: 1.5rem;
                width: 70%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }

            .proile-rating {
                font-size: 12px;
                color: #818182;
                margin-top: 5%;
            }

            .proile-rating span {
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }

            .profile-head .nav-tabs {
                margin-bottom: 5%;
            }

            .profile-head .nav-tabs .nav-link {
                font-weight: 600;
                border: none;
            }

            .profile-head .nav-tabs .nav-link.active {
                border: none;
                border-bottom: 2px solid #0062cc;
            }

            .profile-work {
                padding: 14%;
                margin-top: -15%;
            }

            .profile-work p {
                font-size: 12px;
                color: #818182;
                font-weight: 600;
                margin-top: 10%;
            }

            .profile-work a {
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }

            .profile-work ul {
                list-style: none;
            }

            .profile-tab label {
                font-weight: 600;
            }

            .profile-tab p {
                font-weight: 600;
                color: #0062cc;
            }

            .realtives {
                position: relative;
            }

            .carousel {
                background: transparent;
                text-align: center;
            }

            .carousel-cell {
                width: 26%;
                border: 2px solid #000;
                height: 400px;
                background: #fff;
                margin-right: 40px;
                border-radius: 15px;
                box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
                margin-bottom: 70px;
            }

            @media screen and (max-width: 800px) {
                .carousel-cell {
                    width: 50%;
                }
            }

            /* cell number */
            .carousel-cell:before {
                display: block;
                text-align: center;
                line-height: 200px;
                font-size: 80px;
                color: white;
            }
        </style>

    </div>
    </div>
    <style>
        #back {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            backface-visibility: hidden;
            font-family: Verdana;
            font-size: 1em;
            box-shadow: 0 0 5px rgb(230, 230, 230);
            background-color: rgb(230, 230, 230);
            color: #222;
        }

        #boss {
            padding: 10px;
            border-radius: 25px;
            height: 300px;
            overflow-y: scroll;
            box-shadow: 0px 25px 10px -15px
        }

        #boss::-webkit-scrollbar {
            display: none;
        }

        #boss {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>