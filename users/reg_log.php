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
	<center>User <z style="color : red;">Account Area</z></center>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-4">
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
				?>
				<form action="reg_log.php" method="POST">
					<div class="card card-1">
						<?php echo $email_error;
						echo $password_error; ?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Email address</label>
							<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
						<label for="inputPassword5" class="form-label">Password</label>
						<input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
						<div id="passwordHelpBlock" class="form-text">
							Your password must be 8-20 characters long, contain letters, numbers and special characters.
						</div>

						<input type="submit" class="btn btn-primary" name="submit" value="Login" />
					</div>
				</form>

			</div>
			<div class="col-4">
				<form action="login.php" method="POST">
					<div class="card card-1">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">E-mail</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
						<label for="inputPassword5" class="form-label">Password</label>
						<input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
						<div id="passwordHelpBlock" class="form-text">
							Your password must be 8-20 characters long, contain letters, numbers and special characters.
						</div>
						<label for="inputPassword5" class="form-label">Repeat-Password</label>
						<input type="password" name="repeat-password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
						<label for="inputPassword5" class="form-label">Mobile Number</label>
						<input type="number" name="mobile" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"><br>
						<select class="form-select" aria-label="Default select example" name="gender">
							<option selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select><br>
						<input type="submit" class="btn btn-primary" value="Register" name="reg">
					</div>
				</form>
			</div>
		</div>
	</div>
	<style>
		.card-1 {
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
			transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
			padding: 20px;
		}

		.card-1:hover {
			box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
		}
	</style>