<?php include_once("database/phpmyadmin/connection.php"); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vadhuvuvarudu - Login To Continue</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
</head>

<body>
    <div class='image_area'>
        <div style='padding: 10px;'>
            <a href='contact.php' style="float: left; color: #fff; text-decoration: none; border: 1px solid #023e8a; background: #023e8a; padding: 10px; border-radius: 4px; font-family: Roboto-Medium;">Contact Us</a>
        </div>
    </div>
    <div class='login_area'>
        <br><br>
        <br><br>
        <div style='padding: 10px;'>
        <center><img src='images/logo.png' width="200px"></center><br><br>
            <br><br><br><br>
            <f style="font-family: Roboto; font-size: 30px;">Welcome To Vadhuvuvarudu!</f><br><br>
            <?php
            $admin_email = @$_POST['admin_email'];
            $admin_password = @$_POST['admin_password'];
            $error = "";
            if (isset($_POST['login'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($admin_email) || empty($admin_password)) {
                    $error = "<br><f style='font-size: 14px; color: #ff2d2d; border: 1px solid #ff2d2d; padding: 10px;'>You Cannot Leave The Input Fields Empty!</f><br>";
                } else {
                    $sql = "SELECT * FROM admin WHERE admin_email='$admin_email'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        $error = "<br><f style='font-size: 14px; color: #ff2d2d; border: 1px solid #ff2d2d; padding: 10px;'>Username is incorrect!</f><br>";
                    } else {
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['admin_email'];
                            $password_login = $row['admin_password'];
                            //dehashing the password        
                            if ($admin_password == $password_login) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['admin_email'] = $username_login;
                                $_SESSION['admin_password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                                exit();
                            } else {
                                $error = "<br><f style='font-size: 14px; color: #ff2d2d; border: 1px solid #ff2d2d; padding: 10px;'>Unknown Credentials. Check Again Your Inputs!</f><br>";
                            }
                        }
                    }
                }
            }
            ?>
            <center><?php echo $error; ?></center>
            <form action="login.php" method="POST">
                <input type="email" name="admin_email" placeholder="E-mail" class="input_styler">
                <input type="password" name="admin_password" placeholder="Password" class="input_styler">
                <input type="submit" name="login" value="Login" class="submit_styler">
            </form>

        </div>
    </div>
    </div>
</body>

</html>