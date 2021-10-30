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
        $query = "SELECT * from users";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $user_id = $rows['id'];
        $username = $rows['username'];
        $email = $rows['email'];
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
      <h2 class="col-md-4" id="subhead" style="color: white;">Subscribed Users! <lord-icon
                      src="https://cdn.lordicon.com/cjieiyzp.json"
                      colors='primary:#83c5be,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon></h2><br><Br>
                  <div class="table-responsive">
                  <table class='table table-hover' style="background-color:#fff; border-radius: 10px;">
                  <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Name</th>
                <th scope='col'>E-Mail</th>
                <th scope='col'>Date Of Birth</th>
                <th scope='col'>Profile</th>
                <th scope='col'>Action</th>
              </tr>
            </thead>
            <tbody>
            
      <?php
      $query_details = "SELECT * from payments";
      $result_details = mysqli_query($conn, $query_details);
      while($rows = mysqli_fetch_assoc($result_details)){
        $payment_id = $rows['id'];
        $payment_email = $rows['email'];
        $query_request_details = "SELECT * from users WHERE email='$payment_email'";
        $result_request_details = mysqli_query($conn, $query_request_details);
        while($rows = mysqli_fetch_assoc($result_request_details))
        {
        $userid = $rows['id'];
        $name = $rows['username'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
        $date_of_birth = $rows['date_of_birth'];
        $gender = $rows['gender'];
    	  $country = $rows['country'];
        $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE id=$userid");
        $get_pic_row = mysqli_fetch_assoc($check_pic);
        $profile_pic_db = $get_pic_row['profile_pic'];
        if ($profile_pic_db == "") {
          $profile_pic = "";
          
          echo "<tr>
          <th scope='row'>$userid</th>
          <td>$name</td>
          <td>$email</td>
          <td>$date_of_birth</td>
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
          <td><img src='";?><?php if($gender == "male"){
            echo"images/male.png";
          } else {
            echo "images/female.png";
          }?><?php echo"' width='100' height='100'></td>
          <td><a href='profile_view.php?id=$userid'><button style='float: right; width: 100%;' class='btn btn-outline-primary'>View Profile</button></a><br><br>
          <a href='delete_user.php?id=$userid'><button style='float: right; width: 100%;' class='btn btn-outline-danger'>Delete Profile</button></a></td></td>
        </tr>";
          }
          else{
            $profile_pic2 = "../users/userdata/".$profile_pic_db;   
            echo "
            <tr>
                <th scope='row'>$userid</th>
                <td>$name</td>
                <td>$email</td>
                <td>$date_of_birth</td>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
                <td>";?><script>$('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
                  var src = $(this).attr('src');
                  var modal;
                
                  function removeModal() {
                    modal.remove();
                    $('body').off('keyup.modal-close');
                  }
                  modal = $('<div>').css({
                    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                    backgroundSize: 'contain',
                    width: '100%',
                    height: '100%',
                    position: 'fixed',
                    zIndex: '10000',
                    top: '0',
                    left: '0',
                    cursor: 'zoom-out'
                  }).click(function() {
                    removeModal();
                  }).appendTo('body');
                  //handling ESC
                  $('body').on('keyup.modal-close', function(e) {
                    if (e.key === 'Escape') {
                      removeModal();
                    }
                  });
                });</script><img data-enlargeable style='cursor: zoom-in;' src='<?php echo $profile_pic2?>' width='100' height='100'></td>
                <?php echo " <td><a href='profile_view.php?id=$userid'><button style='float: right; width: 100%;' class='btn btn-outline-primary'>View Profile</button></a><br><br>
                <a href='delete_user.php?id=$userid'><button style='float: right; width: 100%;' class='btn btn-outline-danger'>Delete Profile</button></a></td>
              </tr>
            ";
          }}}
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







