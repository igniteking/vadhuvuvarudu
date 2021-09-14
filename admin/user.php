<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
    <?php
  if (isset($_SESSION['admin_email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}
?>
    <?php
        $query = "SELECT * from admin WHERE admin_email = '".$_SESSION['admin_email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $admin_name = $rows['admin_name'];
        $admin_email = $rows['admin_email'];
        }
    ?>
  	<title>Users - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
  </head>
  <body>
  <div id="content" class="p-4 p-md-5">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
      <img src="images/logo.png" width ="40px">
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
    </div>
  </div>
</nav>
<div class="row mt-12">
      <h2 class="col-md-4" id="subhead">User Data!</h2>
      <div class="col-md-8"><a href="admin-create.php"><button type="button" onclick="showAlert()" class="btn btn-outline-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Admin</button></a></div>
      <?php
        $query = "SELECT * from users";
        $result = mysqli_query($conn, $query);
        while($rows = mysqli_fetch_assoc($result))
        {
          $user_id = $rows['id'];
          $name = $rows['username'];
          $email = $rows['email'];
          $mobile = $rows['mobile'];
          $dob = $rows['date'];
          $gender = $rows['gender'];
          $caste = $rows['caste'];
          $country = $rows['country'];
          $religion = $rows['religion'];
          echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
          <div class='col-sm' style='padding: 20px;'><img src='images/user.png' width='60px;' height='60px' style='float: right;'></img>
          <form class='col-sm' method='POST' action='user.php'>
          <input type='submit' value='Delete Request' name='delete_request' style='float: right; margin-left: 30px; margin-right: 25%; width: 150px;' class='btn btn-outline-danger'>
          </form>
          <a href='user.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
          ID#$name</a></div></div> E-mail : $email || User Type: $gender <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Date Of Birth : $dob</div></div></div>";
          }
          $delete_request = @$_POST['delete_request'];
    if ($delete_request){
      $delete_query = "DELETE FROM `users` WHERE `id` = '$user_id'";
      $delete_result = mysqli_query($conn, $delete_query);
      if($delete_result)
{
    echo "deleted record"; // display error message if not delete
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
}
else
{
    echo "Error deleting record"; // display error message if not delete
}}
        ?>
      </div>
		</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>