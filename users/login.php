<?php include_once("database/phpmyadmin/connection.php"); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vadhuvuvarudu - Login To Continue</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon" />
</head>

<body>
    <script src="" async defer></script>
    <div class='login_area'>
        <br><br>
        <br><br>
        <div style='padding: 60px;'>
            <img src='images/logo.png' width="60px" style="float: left;"><br><br><br><br><br><br>
            <br><br><br><br>
            <f style="font-family: Roboto; font-size: 30px;">Welcome To Vadhuvuvarudu!</f><br><br>
            <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            $error = "";
            if (isset($_POST['login'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    $error = "<br><f style='font-size: 14px; color: #ff2d2d; border: 1px solid #ff2d2d; padding: 10px;'>You Cannot Leave The Input Fields Empty!</f><br>";
                } else {
                    $sql = "SELECT * FROM users WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        $error = "<br><f style='font-size: 14px; color: #ff2d2d; border: 1px solid #ff2d2d; padding: 10px;'>Username is incorrect!</f><br>";
                    } else {
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            if ($pwd == $password_login) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['email'] = $username_login;
                                $_SESSION['password'] = $password_login;
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
                <input type="email" name="email" placeholder="Userame" value="<?php echo $uid; ?>" class="input_styler">
                <input type="password" name="password" placeholder="Password" class="input_styler"><br><br>
                <input type="submit" name="login" value="Login" class="submit_styler"><br><br>
            </form>

        </div>
    </div>
    <div class='image_area'>
        <div style='padding: 40px;'>
            <a href='contact.php' style="float: right; color: #fff; text-decoration: none; border: 1px solid #023e8a; background: #023e8a; padding: 10px; border-radius: 4px; font-family: Roboto-Medium;">Contact Us</a>
        </div>
    </div>
</body>

</html>