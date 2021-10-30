<?php include_once("database/phpmyadmin/connection.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js">-->
<html>

<head>
    <title>Vadhuvuvarudu - Register And Login</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <!-- CSS only -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
</head>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

<script src="" async defer></script>

<head>

<body>
    <div class="bg-image" style="background-image: url('images/image.jpg');
            height: 40vh">
    </div><br><br>
    
    <center>
        <z style="font-size: 24px;">User</z>
        <z style="color : #fca311; font-size: 24px;">Account Area</z>
    </center><br><Br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6" style="border-right: 1px solid black">
                <center>
                    <z style="color :  #fca311; font-size: 20px;">User Login Area</z><br><br>
                </center>
                <center>
                <?php $email_error = "";
				$password_error = ""; ?>
				<?php
				if (isset($_POST['submit'])) {
					$email = mysqli_real_escape_string($conn, $_POST['email']);
					$pwd = mysqli_real_escape_string($conn, $_POST['password']);
					//Error Handlers
					//Check if inputs are empty
					if (empty($email) || empty($pwd)) {
						echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Username and Password are Empty!</p>";
					} else {
						$sql = "SELECT * FROM users WHERE email='$email'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck < 1) {
							$email_error = "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail is Incorrect!</p>";
						} else {
							if ($row = mysqli_fetch_assoc($result)) {
								$id_login = $row['id'];
								$email_login = $row['email'];
								$password_login = $row['password'];
								//dehashing the password        
								$hashedPwdCheck = password_verify($pwd, $row['password']);
								if ($hashedPwdCheck == false) {
									$password_error = "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password is Incorrect!!</p>";
								} elseif ($hashedPwdCheck == true) {
									$session_token = md5(time() . $email_login);
									$_SESSION['id'] = $id_login;
									$_SESSION['email'] = $email_login;
									$_SESSION['password'] = $password_login;
									//INSERTING TIME
									echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
									exit();
								}
							}
						}
					}
				}
				?><div class="card card-1">
                    <z style="color : grey; font-size: 14px;">You have a account login here</z>
                    <form action="login.php" method="POST"><br>
                    <?php echo $email_error;
						echo $password_error; ?>
                        <input type="email" name="email" placeholder="E-mail Id / Unique Id">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" class="btn-submit" name="submit" value="Login" />
                    </form></div>
            </div>
            <div class="col-6">
                <center>
                    <z style="color :  #fca311; font-size: 20px;">User Registeration Area</z>
                </center>
                <center>
                    <z style="color : grey; font-size: 14px;">Let's set up your account, your matches are waiting for you</z>
                    <?php
    $reg = @$_POST['reg'];
    $username = strip_tags(@$_POST['username']);
    $email = strip_tags(@$_POST['email']);
    $password = strip_tags(@$_POST['password']);
    $mobile = strip_tags(@$_POST['mobile']);
	$gender = strip_tags(@$_POST['gender']);
    $r_pswd = strip_tags(@$_POST['repeat-password']);
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
                                          '$username', '$gender' , '$email','$mobile', '$hashedPwd','','','', '', '0','$vkey', '', '', '',
                                          '', '', '', '', '$mobile_otp', '0', '', '', '', '', '', '', '', '', '',
                                           '', '', '', '', '', '', '')");
                                       // echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php?status=1\">";
                                        echo "YOUR ACCOUNT HAVE BEEN CREATED!";
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
    ?><div class="card card-1">
                    <form action="login.php" method="POST"><br><br>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter your username" aria-describedby="emailHelp">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email id" aria-describedby="emailHelp">
                        <input type="password" name="password" id="inputPassword5" class="form-control" placeholder="Create your password" aria-describedby="passwordHelpBlock">
                        <input type="password" name="repeat-password" id="inputPassword5" class="form-control" placeholder="Re-Enter your password" aria-describedby="passwordHelpBlock">
                        <input type="number" name="mobile" id="inputPassword5" class="form-control" placeholder="Enter your mobile number" aria-describedby="passwordHelpBlock">
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <option selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>
                        <input type="submit" class="btn-submit" name="reg" value="Next" /><br><br>
                    </form>
            </div>
        </div>
    </div>
    </div>
    <style lang="scss">
  /* SCSS code here*/

        .card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  border-radius: 4px;
  padding: 30px;
}

.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  padding: 40px;
  border-radius: 14px;
}
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        .form-select {
            padding: 10px;
            border: 1px solid grey;
            width: 100%;
            font-size: 14px;
            margin-top: 8px;
            transition: border-radius 0.5s, border 0.5s;
        }
        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover,
        input[type="number"]:hover,
        .form-select:hover {
            padding: 10px;
            border: 1px solid blue;
            border-radius: 14px;
            width: 100%;
            font-size: 14px;
            margin-top: 8px;
        }
        .btn-submit {
            width: 50%;
            margin-top: 8px;
            border: none;
            background-color: #fca311;
            color: white;
            padding: 10px;
            transition: border-radius 0.5s;
        }
        .btn-submit:hover {
            width: 50%;
            margin-top: 8px;
            border: none;
            background-color: #fca311;
            color: white;
            padding: 10px;
            border-radius: 14px;
        }

        @media only screen and (max-width: 600px) {
            .bg-image {
                display: none;
            }
        }
</style>