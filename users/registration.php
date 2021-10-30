<?php include_once("database/phpmyadmin/connection.php"); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vadhuvuvarudu - Register To Continue</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    $reg = @$_POST['reg'];
    $username = strip_tags(@$_POST['username']);
    $email = strip_tags(@$_POST['email']);
    $password = strip_tags(@$_POST['password']);
    $mobile = strip_tags(@$_POST['mobile']);
    $r_pswd = strip_tags(@$_POST['repeat-password']);
    $age = strip_tags(@$_POST['age']);
    $caste = strip_tags(@$_POST['caste']);
    $gender = strip_tags(@$_POST['gender']);
    $state = strip_tags(@$_POST['state']);
    $city = strip_tags(@$_POST['city']);
    $date_of_birth = strip_tags(@$_POST['date_of_birth']);
    $postalcode = strip_tags(@$_POST['pincode']);
    $religion = strip_tags(@$_POST['religion']);
    $maritial_status = strip_tags(@$_POST['maritial_status']);
    $vkey = md5(time() . $username);
    $randomNum = substr(str_shuffle("0123456789"), 0, 4);
    $mobile_otp = $randomNum;
    if ($reg) {
        if ($username && $password && $r_pswd) {
            $user_check = "SELECT username from users WHERE username='$username'";
            $result = mysqli_query($conn, $user_check);
            $user_check2 = "SELECT email from users WHERE email='$email'";
            $result2 = mysqli_query($conn, $user_check2);
            $result_check = mysqli_num_rows($result);
            $result_check2 = mysqli_num_rows($result2);
            if (!$result_check > 0) {
                if (!$result_check2 > 0) {
                    if ($password == $r_pswd) {
                        if (preg_match("/\d/", $password)) {
                            if (preg_match("/[A-Z]/", $password)) {
                                if (preg_match("/[a-z]/", $password)) {
                                    if (preg_match("/\W/", $password)) {
                                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                        mysqli_query($conn, "INSERT INTO `users`(`id`, `username`, `gender`, `email`, `mobile`, `password`, 
                                        `bio`, `date_of_birth`, `time_of_birth`, `city_of_birth`, `active`, `token_key`, `state`, `city`, `postalcode`,
                                         `education`, `country`, `additional`, `profile_pic`, `mobile_otp`, `mobile_active`, `age`, `height`, 
                                         `profession`, `parent_details`, `hobbies`, `expectations`, `caste`, `religion`, `maritial_status`, 
                                         `brahmin_sect`, `subsect`, `gothra`, `nakshatra`, `rashi`, `income`, `disability`) VALUES (NULL,
                                          '$username', '$gender' , '$email','$mobile', '$hashedPwd','','$date_of_birth','', '', '0','$vkey', '$state', '$city', '$postalcode',
                                          '', '', '', '', '$mobile_otp', '0', '$age', '', '', '', '', '', '$caste', '$religion', '$maritial_status',
                                           '', '', '', '', '', '', '')");
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php?status=1\">";
                                        echo "DONE";
                                    } else {
                                        echo "<div class='error-styler'><center>
                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one special character!</p>;
                                        </center></div>";
                                    }
                                } else {
                                    echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one small Letter</p>
                </center></div>";
                                }
                            } else {
                                echo "<div class='error-styler'><center>
                                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one Capital Letter</p>
                </center></div>";
                            }
                        } else {
                            echo "<div class='error-styler'><center>
                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one digit</p>
            </center></div>";
                        }
                    } else {
                        echo "<div class='error-styler'><center>
                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Both Password's Dont Match!</p>
            </center></div>";
                    }
                } else {
                    echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail already exist!</p>
            </center></div>";
                }
            } else {
                echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Username already exist!</p>
            </center></div>";
            }
        } else {
            echo "<div class='error-styler'><center>
                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Please Fill In All Fields!</p>
            </center></div>";
        }
    }
    ?>
    <div class="row g-0">
        <div class="col-xl-6 d-none d-xl-block">
            <img src="images/image.jpg" alt="Sample photo" class="img-fluid" style="border-bottom-right-radius: 700px; width: 100%; height: 100%;" />
        </div>
        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">
                <h3 class="mb-5">
                    <img src='images/logo.png' width="100px">
                    <f style="font-family: Roboto;">Welcome To Vadhuvuvarudu!</f>
                </h3>

                <form action="registration.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="form3Example1m" name="username" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1m">User name</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="email" id="form3Example1n" name="email" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n">E-mail</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="password" id="form3Example1m1" name="password" class="form-control form-control-lg" />
                                Password should contain at least one special character and one number atleast!
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="password" id="form3Example1n1" name="repeat-password" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n1">Re-Type Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="number" id="form3Example1m1" name="mobile" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1m1">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="number" id="form3Example1n1" name="age" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n1">Age</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example8" name="caste" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example8">Caste</label>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="form3Example1m1" name="state" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1m1">State</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="form3Example1n1" name="city" class="form-control form-control-lg" />
                                <label class="form-label" for="form3Example1n1">City</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="date" id="form3Example9" name="date_of_birth" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example9">Date Of Birth</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="number" id="form3Example90" name="pincode" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example90">Pincode</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example99" name="religion" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example99">Religion</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example97" name="maritial_status" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example97">Maritial Status</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <p style="font-size: 14px;">By Registering you will be accepting our Terms And Conditions!</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="submit" class="btn btn-success btn-lg" style="width: 100%;" name="reg"></button>
                        </div>
                        
                    </div>
                </form>
                <a href="login.php" ><Button class="submit_styler">Go to Login</button></a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <style>
        body {
            overflow-x: hidden;
        }

        input[type="text"] {
            height: 40px;
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
    </div>
</body>

</html>