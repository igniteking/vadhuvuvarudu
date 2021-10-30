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
        $user = $rows['username'];
        $email = $rows['email'];
        $mobile_number = $rows['mobile'];
        $bio = $rows['bio'];
        $gender = $rows['gender'];
        $date_of_birth = $rows['date_of_birth'];
        $time_of_birth = $rows['time_of_birth'];
        $city_of_birth = $rows['city_of_birth'];
        $state = $rows['state'];
        $city = $rows['city'];
        $postalcode = $rows['postalcode'];
        $education = $rows['education'];
        $country = $rows['country'];
        $additional = $rows['additional'];
        $active = $rows['active'];
        $age = $rows['age'];
        $height = $rows['height'];
        $profession = $rows['profession'];
        $parent_details = $rows['parent_details'];
        $hobbies = $rows['hobbies'];
        $expectations = $rows['expectations'];
        $caste = $rows['caste'];
        $religion = $rows['religion'];
        $maritial_status = $rows['maritial_status'];
        $brahmin_sect = $rows['brahmin_sect'];
        $subsect = $rows['subsect'];
        $gothra = $rows['gothra'];
        $nakshatra = $rows['nakshatra'];
        $rashi = $rows['rashi'];
        $income = $rows['income'];
        $disability = $rows['disability'];
        // if ($active == "0") {
        //     $active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        // } else {
        //     $email_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        // }
        $email_mobile_otp = $rows['mobile_otp'];
        $mobile_count_active = $rows['mobile_active'];
        $mobile_active = $rows['mobile_active'];
        if ($mobile_active == "") {
            $mobile_active = "0";
        }
        if ($mobile_active == "0") {
            $mobile_active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        } else {
            $mobile_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        }
    }
    ?>
    <title>Profile - Vadhuvuvarudu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="style/css/css/style.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
            $user = $_POST['username'];
            $bio = $_POST['bio'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            $time_of_birth = $_POST['time_of_birth'];
            $city_of_birth = $_POST['city_of_birth'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $postalcode = $_POST['postalcode'];
            $education = $_POST['education'];
            $country = $_POST['country'];
            $additional = $_POST['additional'];
            $age = $_POST['age'];
            $height = $_POST['height'];
            $profession = $_POST['profession'];
            $parent_details = $_POST['parent_details'];
            $hobbies = $_POST['hobbies'];
            $expectations = $_POST['expectations'];
            $caste = $_POST['caste'];
            $religion = $_POST['religion'];
            $maritial_status = $_POST['maritial_status'];
            $brahmin_sect = $_POST['brahmin_sect'];
            $subsect = $_POST['subsect'];
            $gothra = $_POST['gothra'];
            $nakshatra = $_POST['nakshatra'];
            $rashi = $_POST['rashi'];
            $income = $_POST['income'];
            $disability = $_POST['disability'];

            $sql123 = "UPDATE `users` SET `bio`='$bio',
         `state`='$state',`city`='$city', `postalcode`='$postalcode', `education`='$education', `profession`='$profession', `country`='$country', `additional`='$additional', 
         `age`='$age', `height`='$height', `parent_details`='$parent_details', `hobbies`='$hobbies', `expectations`='$expectations',
         `username`='$user',`gender`='$gender',`mobile`='$mobile_number',`date_of_birth`='$date_of_birth',
         `time_of_birth`='$time_of_birth',`city_of_birth`='$city_of_birth', `age`='$age',`caste`='$caste',`religion`='$religion',
         `maritial_status`='$maritial_status',`brahmin_sect`='$brahmin_sect',`subsect`='$subsect',`gothra`='$gothra',`nakshatra`='$nakshatra',`rashi`='$rashi',`income`='$income',`disability`='$disability' WHERE email='$email'";
            $rt123 = mysqli_query($conn, $sql123);
            if ($rt123) {
                echo "<h6 style='color: white;'> Profile Updated!</h6> !";
            } else {
                echo "<h1> ERROR!</h1> ";
            }
        }

        ?>
        <h2 class="" style="float: left; color: white;">Edit Profile!</h2><a href="report.php" target="_blank"><button type="button" onclick="showAlert()" style="float: right; display: none;" class="btn btn-outline-danger float-right"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report</button></a>
        <br>
        <script>
            function showAlert() {
                alert("Hello! Please Take a Screen Shot For Our Reference!!..");
            }
        </script>
        <div class="container rounded bg-white mt-5 mb-5" style="border: 2px solid black; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <div class="row">
                <div class="col-md-3 border-right">

                    <?php
                    $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$email'");
                    $get_pic_row = mysqli_fetch_assoc($check_pic);
                    $profile_pic_db = $get_pic_row['profile_pic'];
                    if ($profile_pic_db == "") {
                        $profile_pic2 = "<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' width='150px' src='images/user.png'><br><span class='font-weight-bold'>$user</span><span class='text-black-50'>$email</span></div>";
                        echo $profile_pic2;
                    } else {
                        $profile_pic2 = "userdata/" . $profile_pic_db;
                        echo "<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-3' width='150px' height='150px;' src='$profile_pic2'><br><br><span class='font-weight-bold'>$user</span><span class='text-black-50'>$email</span><span> </span></div>";
                    }
                    ?>

                    <?php
                    $otp_field = "";
                    $otp_resend = "";
                    $otp = @$_POST['otp'];
                    $otp_resend = @$_POST['otp_resend'];
                    $mobile = strip_tags(@$_POST['mobile']);
                    $otp_verify = strip_tags(@$_POST['otp_verify']);
                    if ($otp_resend) {
                        //file_get_contents("https://api.authkey.io/request?authkey=7f42f5c007696345&mobile=$mobile&country_code=91&sid=734&name=Rohan&otp=$mobile_otp");
                        $otp_field = "<br><div class='col-md-12'><label class='labels'>Please Check Your Mobile</label><input type='number' name='otp_verify' class='form-control' placeholder='Enter OTP'></div><br>";
                        $otp_resend = '<div class="mt-2 text-center"><button class="btn btn-primary profile-button" id="resend_disable" name="otp_resend" value="Update" disabled="disabled">Resend OTP</button></div>';
                    }
                    if ($otp) {
                        if (strlen($mobile) == 10) {
                            if (!$otp_verify) {
                                //file_get_contents("https://api.authkey.io/request?authkey=7f42f5c007696345&mobile=$mobile&country_code=91&sid=734&name=Rohan&otp=$mobile_otp");
                                $otp_field = "<br><div class='col-md-12'><label class='labels'>Please Check Your Mobile</label><input type='number' name='otp_verify' class='form-control' placeholder='Enter OTP'></div><br>";
                                $otp_resend = '<div class="mt-2 text-center"><button class="btn btn-primary profile-button" name="otp_resend" value="Update">Resend OTP</button></div>';
                            } else {
                                if ($otp_verify == $mobile_otp) {
                                    $sql = "UPDATE users SET mobile_active='1', mobile='$mobile' WHERE email='$email'";
                                    $query = mysqli_query($conn, $sql);
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=profile.php\">";
                                } else {
                                    $otp_field = "<br><div class='col-md-12'><input type='number' name='otp_verify' class='form-control' placeholder='Invalid OTP'></div><br>";
                                }
                            }
                        } else {
                            $otp_field = "Invalid Mobile Number!";
                        }
                    }
                    ?>
                    <form action="profile.php" method="POST">
                        <?php
                        if ($active == 1) {
                            echo "<div class='col-md-12'><label class='labels'>E-mail ID - </label><input type='text' name='email' class='form-control' readonly='readonly' placeholder='Enter E-mail ID' value='$email'></div>";
                        } else {
                            echo "<div class='col-md-12'><label class='labels'>E-mail ID - </label><input type='text' name='email' class='form-control' placeholder='Enter E-mail ID' value='$email'></div>";
                        }
                        ?>
                        <br>
                        <?php
                        if ($mobile_count_active == 1) {
                            echo "<div class='col-md-12'><label class='labels'>Mobile -</label><input type='number' name='mobile' class='form-control' readonly='readonly' placeholder='Enter Mobile' value='$mobile_number'></div>";
                        } else {
                            echo "<div class='col-md-12'><label class='labels'>Mobile -</label><input type='number' name='mobile' class='form-control' placeholder='$mobile_number' value='$mobile'></div>";
                        }
                        echo $otp_field;
                        echo $otp_resend;
                        ?>
                        <div class="mt-2 text-center"><button class="btn btn-primary profile-button" name="otp" value="Update">Save</button></div>
                        <br>
                    </form>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form method="post" action="profile.php?email=<?php echo $email; ?>">
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Full Name</label><input type="text" name="username" class="form-control" placeholder="Your name" value="<?php echo $user ?>"></div>
                                <div class="col-md-6"><label class="labels">Gender</label><select class="form-control" name="gender">
                                        <option selected><?php echo $gender ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label class="labels">Height</label><input type="text" name="height" class="form-control" placeholder="Height" value="<?php echo $height ?>"></div>
                                <div class="col-md-4"><label class="labels">Age</label><input type="text" name="age" class="form-control" placeholder="Age" value="<?php echo $age; ?>"></div>
                                <div class="col-md-4"><label class="labels">PostalCode</label><input type="text" name="postalcode" class="form-control" value="<?php echo $postalcode; ?>" placeholder="PostalCode"></div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4"><label class="labels">Country</label><input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $country ?>"></div>
                                <div class="col-md-4"><label class="labels">State/Region</label><input type="text" name="state" class="form-control" value="<?php echo $state; ?>" placeholder="State"></div>
                                <div class="col-md-4"><label class="labels">City</label><input type="text" name="city" class="form-control" value="<?php echo $city; ?>" placeholder="City"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Religion</label><input type="text" name="religion" class="form-control" placeholder="Religion" value="<?php echo $religion ?>"></div>
                                <div class="col-md-6"><label class="labels">Caste</label><input type="text" name="caste" class="form-control" placeholder="Caste" value="<?php echo $caste ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label class="labels">Time Of Birth</label><input type="time" name="time_of_birth" class="form-control" placeholder="Time Of Birth" value="<?php echo $time_of_birth ?>"></div>
                                <div class="col-md-4"><label class="labels">Date Of Birth</label><input type="date" name="date_of_birth" class="form-control" placeholder="Date Of Birth" value="<?php echo $date_of_birth ?>"></div>
                                <div class="col-md-4"><label class="labels">Place Of Birth</label><input type="text" name="city_of_birth" class="form-control" placeholder="Place Of Birth" value="<?php echo $city_of_birth ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Maritial Status</label><input type="text" name="maritial_status" class="form-control" placeholder="Maritial Status" value="<?php echo $maritial_status ?>"></div>
                                <div class="col-md-6"><label class="labels">Brahmin Sect</label><input type="text" name="brahmin_sect" class="form-control" placeholder="Brahmin Sect" value="<?php echo $brahmin_sect ?>"></div>
                                <div class="col-md-6"><label class="labels">Subsect</label><input type="text" name="subsect" class="form-control" placeholder="Subsect" value="<?php echo $subsect ?>"></div>
                                <div class="col-md-6"><label class="labels">Gothra</label><input type="text" name="gothra" class="form-control" placeholder="Gothra" value="<?php echo $gothra ?>"></div>
                                <div class="col-md-6"><label class="labels">Nakshatra</label><input type="text" name="nakshatra" class="form-control" placeholder="Nakshatra" value="<?php echo $nakshatra ?>"></div>
                                <div class="col-md-6"><label class="labels">Rashi</label><input type="text" name="rashi" class="form-control" placeholder="Rashi" value="<?php echo $rashi ?>"></div>
                                <div class="col-md-6"><label class="labels">Income (yearly)</label><input type="number" name="income" class="form-control" placeholder="Income" value="<?php echo $income ?>"></div>
                                <div class="col-md-6"><label class="labels">Disability</label><input type="text" name="disability" class="form-control" placeholder="Disability" value="<?php echo $disability ?>"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save_profile" value="Update">Save Profile</button></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit Bio</span></div>
                        <div class="col-md-12"><label class="labels">Profession</label><input type="text" name="profession" class="form-control" placeholder="Profession" value="<?php echo $profession ?>"></div>
                        <div class="col-md-12"><label class="labels">Hobbies</label><input type="text" name="hobbies" class="form-control" placeholder="Hobbies" value="<?php echo $hobbies ?>"></div>
                        <div class="col-md-12"><label class="labels">Education</label><input type="text" name="education" class="form-control" placeholder="Education" value="<?php echo $education ?>"></div>
                        <div class="col-md-12"><label class="labels">Bio</label><textarea class="form-control" placeholder="Your Bio" name="bio"><?php echo $bio ?></textarea></div> <br>
                        <div class="col-md-12"><label class="labels">Expectations</label><textarea class="form-control" placeholder="Your Expectations" name="expectations"><?php echo $expectations ?></textarea></div> <br>
                        <div class="col-md-12"><label class="labels">Parents Details</label><textarea class="form-control" placeholder="Your Parent Details" name="parent_details"><?php echo $parent_details ?></textarea></div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" name="additional" placeholder="Additional Details" value="<?php echo $additional ?>"></div>
                        </form> <br>
                        <?php
                        $cover_upload = @$_POST['upload_cover'];
                        if ($cover_upload) {
                            if (((@$_FILES["img"]["type"] == "image/jpeg") || (@$_FILES["img"]["type"] == "image/png") || (@$_FILES["img"]["type"] == "image/gif")) && (@$_FILES["img"]["size"] < 10048576)) {
                                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                $rand_dir_name = substr(str_shuffle($chars), 0, 15);
                                mkdir("userdata/$rand_dir_name");
                                if (file_exists("userdata/$rand_dir_name/" . @$_FILES['img']['name'])) {
                                    $error = "Image Already Exists!";
                                } else {
                                    move_uploaded_file(@$_FILES['img']['tmp_name'], "userdata/$rand_dir_name/" . $_FILES['img']['name']);
                                    $cover_pic_name = "$rand_dir_name/" . @$_FILES['img']['name'];
                                    $sql = "UPDATE users SET profile_pic=? WHERE email=?";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "Framework Error!";
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "ss", $cover_pic_name, $email);
                                        mysqli_stmt_execute($stmt);
                                        echo "Uploaded!";
                                        exit("<meta http-equiv=\"refresh\" content=\"0\">");
                                    };
                                };
                            };
                        };
                        ?>

                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <form action='#' method='POST' enctype='multipart/form-data' style="display: inline;">
                                    <b>Upload with 2:2 Ratio Image</b>
                                    <input type="file" name="img" id="upload" hidden /><label for="upload" class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Profile Picture</label>
                            </div><br>
                            <input class="btn btn-primary profile-button" type="submit" name="upload_cover" value="Upload Profile Picture" />
                        </div>
                        </form>
                        <?php
                        if (isset($_POST['delete_cover'])) {
                            $sql = "UPDATE `users` SET `profile_pic`=''";
                            $rt = mysqli_query($conn, $sql);
                            if ($rt) {
                                echo "Deleted!";
                                exit("<meta http-equiv=\"refresh\" content=\"0\">"); // redirects to all records page
                            } else {
                                echo "<h1> ERROR!</h1> " . $sql;
                            }
                        }
                        ?>
                        <form form method="POST" action="" enctype="multipart/form-data" style="display: inline;">
                            <div class="mt-2 col-md-6"><input class="btn btn-danger delete-button" type="submit" name="delete_cover" value="Delete Profile Picture " /></div>
                        </form>
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
    </style>
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