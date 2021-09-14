<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<link rel="icon" type="image/png" sizes="192x192" href="images/main.png">
<?php
if (isset($_SESSION['admin_email'])) {

  $query = "SELECT * from admin WHERE admin_email = '$email'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $admin_id = $rows['id'];
    $admin_name = $rows['admin_name'];
    $admin_email = $rows['admin_email'];
  }
} else {
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
       <center><img class='rounded-circle mt-5' width='150px' height='150px;' src='images/logo.png'></center><br>
      <center><h4 style="color: white;"><a href="profile.php"><?php echo $admin_name; ?></a></h4><br></center>
      <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                    src='https://cdn.lordicon.com/gmzxduhd.json'
                    trigger='loop'
                    delay= '1000'
                    colors='primary:#ffffff,secondary:#ffffff'
                    style='width: 50px;height: 50px'>
                </lord-icon> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                      <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                  <li>
                <a href='faq.php'>FAQ</a>
              </li>
                </ul>
              </li>
              <li>
                  <a href='user.php'><lord-icon
                  src='https://cdn.lordicon.com/jvucoldz.json'
                    trigger='loop'
                    delay='1000'
                  colors='primary:#ffffff,secondary:#ffffff'
                  style='width:50px;height:50px'>
              </lord-icon> User Data</a>
              </li>
              <li>
                <a href='#inventorySubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
                <lord-icon
                src="https://cdn.lordicon.com/uukerzzv.json"
                    trigger='loop'
                    delay= '1000'
                    colors='primary:#ffffff,secondary:#ffffff'
                    style='width: 50px;height: 50px'>
                </lord-icon> User Inventory</a>
                <ul class='collapse list-unstyled' id='inventorySubmenu'>
                <li>
                      <a href='index.php'>Membership</a>
                  </li>
                  <li>
                      <a href='about.php'>Without Membership</a>
                  </li>
                </ul>
              </li>
            </ul>
        <div class="footer">
          <?php
          if (!isset($_SESSION['admin_email'])) {
          } else {

            echo '<a href="logout.php"><button style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;"><i class="fas fa-sign-out-alt"></i> Logout</button></a>';
          }
          ?>
        </div>
    </nav>

    <!-- Page Content  -->
    <style>
      html {
        user-select: none;
        /* supported by Chrome and Opera */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
      }
    </style>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>

</body>

</html>