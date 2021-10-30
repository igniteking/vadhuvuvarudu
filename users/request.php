<?php include_once("database/phpmyadmin/header.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <?php
  if (isset($_SESSION['email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}
?>
    <?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $user_id = $rows['id'];
        $username = $rows['username'];
        $email = $rows['email'];
        }
    ?>
  	<title>Requests! - Vadhuvuvarudu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="style/css/css/style.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
      <h2 class="col-md-4" id="subhead" style="color: white;">Requests! <lord-icon
                      src="https://cdn.lordicon.com/zpxybbhl.json"
                      trigger='loop'
                      delay='1000'
                      colors='primary:#000000,secondary:#fca311'
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
        $query = "SELECT * from request WHERE user_to = '$user_id'  AND `subject` = 'pending'";
        $result = mysqli_query($conn, $query);
        while($rows = mysqli_fetch_assoc($result))
          {
        $request_id = $rows['id'];
        $user_from = $rows['user_from'];
        $user_to = $rows['user_to'];
        $date = $rows['date'];

        $query_request_details = "SELECT * from users WHERE id = '$user_from'";
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
          <td><img style'cursor: zoom-in;' src='";?><?php if($gender == "male"){
            echo"images/male.png";
          } else {
            echo "images/female.png";
          }?><?php echo"' width='100' height='100'></td>
          <td><form method='POST' action='request.php'>
          <input type='submit' value='Delete Request' style='float: right; width: 100%;' name='delete_request'class='btn btn-outline-danger'>
          </form><br>
          <form method='POST' action='request.php'>
          <input type='submit' value='Accept Request' style='float: right; width: 100%;' name='accept_request' class='btn btn-outline-primary'>
          </form><br></td>
        </tr>";
          }
          else{
            $profile_pic2 = "userdata/".$profile_pic_db;   
            echo "
            <tr>
                <th scope='row'>$userid</th>
                <td>$name</td>
                <td>$email</td>
                <td>$dob</td>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
                <td>";?>
                <?php echo "<img data-enlargeable style='cursor: zoom-in;' src='$profile_pic2' width='100' height='100'></td><td><form method='POST' action='request.php'>
          <input type='submit' value='Delete Request' style='float: right; width: 100%;' name='delete_request'class='btn btn-outline-danger'>
          </form><br>
          <form method='POST' action='request.php'>
          <input type='submit' value='Accept Request' style='float: right; width: 100%;' name='accept_request' class='btn btn-outline-primary'>
          </form><br></td>
        </tr>";
          }}}
          $delete_request = @$_POST['delete_request'];
          if ($delete_request){
            $delete_query = "DELETE FROM `request` WHERE `user_from` = '$user_from' AND `user_to` = '$user_to'";
            $delete_result = mysqli_query($conn, $delete_query);
            if($delete_result)
      {
          echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
      }
      else
      {
          echo "Error deleting record"; // display error message if not delete
      }}
      
      
      $accept_request = @$_POST['accept_request'];
      if ($accept_request){
        $accept_query = "UPDATE `request` SET `subject`='completed' WHERE `user_from` = '$user_from' AND `user_to` = '$user_to'";
        $accept_result = mysqli_query($conn, $accept_query);
        if($accept_result)
      {
      echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
      }
      else
      {
      echo "Error accepted record"; // display error message if not delete
      }}
      ?><script>$('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
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
      });</script>
</tbody>
          </table></div>
      </div>
		</div>
      </div>
		</div>
    <style>      .un-blur {
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
}</style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>