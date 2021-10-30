<?php include_once("database/phpmyadmin/header.php"); ?>
<!doctype html>
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
        $query = "SELECT * from admin";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $admin_id = $rows['id'];
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
      <h2 class="col-md-10" id="subhead" style="color: white;">All Admin! </h2><a href="admin-create.php" class="col-md-2" style="text-decoration: none; width: 100%;"><button class="btn btn-outline-success" style="float: right;"> Create Admin</button></a>
                  <div class="table-responsive">
                  <br>
                  <table class='table table-hover' style="background-color:#fff; border-radius: 10px;">
                  <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Name</th>
                <th scope='col'>E-Mail</th>
                <th scope='col'>Action</th>
              </tr>
            </thead>
            <tbody>
            
      <?php
        $query_request_details = "SELECT * from admin";
        $result_request_details = mysqli_query($conn, $query_request_details);
        while($rows = mysqli_fetch_assoc($result_request_details))
        {
        $userid = $rows['id'];
        $name = $rows['admin_name'];
        $email = $rows['admin_email'];
        
          echo "<tr>
          <th scope='row'>$userid</th>
          <td>$name</td>
          <td>$email</td>
          <td>
          <a href='delete_admin.php?id=$userid'><button style='float: right; width: 100%;' class='btn btn-outline-danger'>Delete Profile</button></a></td></td>
        </tr>";}
?>
</tbody>
          </table></div>
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
  background-size:cover;
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
  </body>
</html>







