<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<link rel="icon" type="image/png" sizes="192x192" href="images/logo.png">
<?php
if (isset($_SESSION['email'])) {

  $query = "SELECT * from users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $user = $rows['username'];
    $em = $rows['email'];
    $active = $rows['active'];
  }
} else {
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://kit.fontawesome.com/280dd93445.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <center><img class='rounded-circle mt-5' width='150px' height='150px;' src='images/logo.png'></center><br>
        <center>
          <h4 style="color: white;"><a href="profile.php"><?php echo $user; ?></a></h4><br>
        </center>

        <ul class='list-unstyled components mb-5'>
          <li class='active'>
            <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>
              <lord-icon src='https://cdn.lordicon.com/gmzxduhd.json' colors='primary:#ffffff,secondary:#ffffff' style='width:50px;height:50px'>
              </lord-icon> Home
            </a>
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
            </ul>
          </li>
          <li>
            <a href='membership.php'>
              <lord-icon src="https://cdn.lordicon.com/cjieiyzp.json" colors='primary:#83c5be,secondary:#ffffff' style='width:50px;height:50px'>
              </lord-icon> Membership
            </a>
          </li>
          <li>
            <a href='request.php'>
              <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" colors='primary:#ffffff,secondary:#fca311' style='width:50px;height:50px'>
              </lord-icon> Requests
            </a>
          </li>
          <li>
            <a href='connections.php'>
              <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
              <lord-icon src="https://cdn.lordicon.com/gazjnoea.json" colors="primary:#ffffff,secondary:#e63946" style="width:50px;height:50px">
              </lord-icon> Connections
            </a>
          </li>
          <li>
            <a href='profile.php'>
              <lord-icon src='https://cdn.lordicon.com/dxjqoygy.json' colors='primary:#ffffff,secondary:#ffffff' style='width:50px;height:50px'>
              </lord-icon> Profile
            </a>
          </li>
        </ul>
        <div class="footer">
          <?php
          if (!isset($_SESSION['email'])) {
          } else {

            echo '<a href="logout.php"><button style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;"><i class="fas fa-sign-out-alt"></i> Logout</button></a>';
          }
          ?>
        </div>
    </nav>



    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>

</body>

</html>