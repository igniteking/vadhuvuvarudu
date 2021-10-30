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
  $query = "SELECT * from admin WHERE admin_email = '$admin_email'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $admin_name = $rows['admin_name'];
    $admin_email = $rows['admin_email'];
  }
  ?>
  <?php
  $query = "SELECT * from users";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user = $rows['username'];
    $email = $rows['email'];
    $mobile = $rows['mobile'];
    $gender = $rows['gender'];
    $profession = $rows['profession'];
    $active = $rows['active'];
    $bio = $rows['bio'];
    $state = $rows['state'];
    $city = $rows['city'];
    $country = $rows['country'];
  }
  ?>
  <title>Dashboard - GlowEdu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="style/css/css/style.css">
  <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
  <div class="un-blur"></div>
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary" style="background-color: #000;">
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/phtfmmnb.json"
    trigger="morph-two-way"
    colors="primary:#ffffff,secondary:#ffffff"
    style="width:30px;height:30px">
</lord-icon>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
        <lord-icon
    src="https://cdn.lordicon.com/phtfmmnb.json"
    trigger="morph-two-way"
    colors="primary:#ffffff,secondary:#ffffff"
    style="width:30px;height:30px">
</lord-icon>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <img src="images/logo.png" width="40px">
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
            <li class="nav-item">
              <div class="input-group">
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
    $query_details = "SELECT * from payments";
    $result_details = mysqli_query($conn, $query_details);
    $rowcount = mysqli_num_rows($result_details);
    ?>
    <div class="row">
      <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading">Subscription Orders</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white"><span><?php echo $rowcount ?></span></div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $query_details2 = "SELECT * from users";
      $result_details2 = mysqli_query($conn, $query_details2);
      $rowcount2 = mysqli_num_rows($result_details2);
      ?>
      <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading">Users</div>
              <div class="widget-subheading">Total User Profiles</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white"><span><?php echo $rowcount2 ?><span></div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $query_details3 = "SELECT * from admin";
      $result_details3 = mysqli_query($conn, $query_details3);
      $rowcount3 = mysqli_num_rows($result_details3);
      ?>
      <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading">Admins</div>
              <div class="widget-subheading">Admin Profiles</div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white"><span><?php echo $rowcount3 ?><span></div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
          <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
              Report
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-eg-77">
                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Recent Users Profiles</h6>
                <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">

                      <?php
                      $user_profile = "SELECT * FROM users ORDER BY id DESC LIMIT 10";
                      $result_details3 = mysqli_query($conn, $user_profile);
                      while ($rows = mysqli_fetch_assoc($result_details3)) {
                        $user_id = $rows['id'];
                        $username = $rows['username'];
                        $email = $rows['email'];
                        $gender = $rows['gender'];
                        $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE id=$user_id");
                        $get_pic_row = mysqli_fetch_assoc($check_pic);
                        $profile_pic_db = $get_pic_row['profile_pic'];
                        if ($profile_pic_db == "") {
                          $profile_pic = "";

                          echo "
                              <li class='list-group-item'>
                              <div class='widget-content p-0'>
                              <div class='widget-content-wrapper'>
                                <div class='widget-content-left mr-3'>
                                  <img width='42' class='rounded-circle' src="; ?><?php if ($gender == "male") {
                                                                                    echo "'images/male.png'";
                                                                                  } else {
                                                                                    echo "'images/female.png'";
                                                                                  }
                                                                                  echo ">
                                </div>
                                <div class='widget-content-left'>
                                  <div class='widget-heading'>$username</div>
                                  <div class='widget-subheading'>$email</div>
                                </div>
                                <div class='widget-content-right'>
                                  <div class='font-size-xlg text-muted'>
                                    <small class='opacity-5 pr-1'>#</small>
                                    <span>$user_id</span>
                                  </div>
                                </div>
                              </div>
                            </div></li>";
                                                                                } else {
                                                                                  $profile_pic2 = "../users/userdata/" . $profile_pic_db;
                                                                                  echo "<li class='list-group-item'>
                            <div class='widget-content p-0'>
                            <div class='widget-content-wrapper'>
                              <div class='widget-content-left mr-3'>
                                <img width='42' class='rounded-circle' src='$profile_pic2' alt=''>
                              </div>
                              <div class='widget-content-left'>
                                <div class='widget-heading'>$username</div>
                                <div class='widget-subheading'>$email</div>
                              </div>
                              <div class='widget-content-right'>
                                <div class='font-size-xlg text-muted'>
                                  <small class='opacity-5 pr-1'>#</small>
                                  <span>$user_id</span>
                                </div>
                              </div>
                            </div>
                    </div></li>";
                                                                                }
                                                                              }
                                                                                  ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="mb-3 card">
          <div class="card-header-tab card-header-tab-animation card-header">
            <div class="card-header-title">
              <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
              Report
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-eg-77">
                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Recent Admins Profiles</h6>
                <div class="scroll-area-sm">
                  <div class="scrollbar-container">
                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">

                      <?php
                      $user_profile = "SELECT * FROM admin ORDER BY id DESC LIMIT 10";
                      $result_details3 = mysqli_query($conn, $user_profile);
                      while ($rows = mysqli_fetch_assoc($result_details3)) {
                        $user_id = $rows['id'];
                        $username = $rows['admin_name'];
                        $email = $rows['admin_email'];
                          echo "
                              <li class='list-group-item'>
                              <div class='widget-content p-0'>
                              <div class='widget-content-wrapper'>
                                <div class='widget-content-left mr-3'>
                                  <img width='42' class='rounded-circle' src='images/user.png'>
                                </div>
                                <div class='widget-content-left'>
                                  <div class='widget-heading'>$username</div>
                                  <div class='widget-subheading'>$email</div>
                                </div>
                                <div class='widget-content-right'>
                                  <div class='font-size-xlg text-muted'>
                                    <small class='opacity-5 pr-1'>#</small>
                                    <span>$user_id</span>
                                  </div>
                                </div>
                              </div>
                            </div></li>";}?></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $query_details = "SELECT * from payments WHERE days = '30'";
      $result_details = mysqli_query($conn, $query_details);
      $rowcount = mysqli_num_rows($result_details);
      ?>
      <div class="col-md-6 col-lg-3">
        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left pr-2 fsize-1">
                  <div class="widget-numbers mt-0 fsize-3 text-danger"><?php echo $rowcount; ?></div>
                </div>
                <div class="widget-content-right w-100">
                  <div class="progress-bar-xs progress">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%;"></div>
                  </div>
                </div>
              </div>
              <div class="widget-content-left fsize-1">
                <div class="text-muted opacity-6">1 Month Subscription:</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $query_details = "SELECT * from payments WHERE days = '90'";
      $result_details = mysqli_query($conn, $query_details);
      $rowcount = mysqli_num_rows($result_details);
      ?>
      <div class="col-md-6 col-lg-3">
        <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left pr-2 fsize-1">
                  <div class="widget-numbers mt-0 fsize-3 text-success"><?php echo $rowcount; ?></div>
                </div>
                <div class="widget-content-right w-100">
                  <div class="progress-bar-xs progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%;"></div>
                  </div>
                </div>
              </div>
              <div class="widget-content-left fsize-1">
                <div class="text-muted opacity-6">3 Month Subscription:</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $query_details = "SELECT * from payments WHERE days = '180'";
      $result_details = mysqli_query($conn, $query_details);
      $rowcount = mysqli_num_rows($result_details);
      ?>
      <div class="col-md-6 col-lg-3">
        <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left pr-2 fsize-1">
                  <div class="widget-numbers mt-0 fsize-3 text-warning"><?php echo $rowcount; ?></div>
                </div>
                <div class="widget-content-right w-100">
                  <div class="progress-bar-xs progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%;"></div>
                  </div>
                </div>
              </div>
              <div class="widget-content-left fsize-1">
                <div class="text-muted opacity-6">6 Month Subscription:</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $query_details = "SELECT * from payments WHERE days = '360'";
      $result_details = mysqli_query($conn, $query_details);
      $rowcount = mysqli_num_rows($result_details);
      ?>
      <div class="col-md-6 col-lg-3">
        <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left pr-2 fsize-1">
                  <div class="widget-numbers mt-0 fsize-3 text-info"><?php echo $rowcount; ?></div>
                </div>
                <div class="widget-content-right w-100">
                  <div class="progress-bar-xs progress">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%;"></div>
                  </div>
                </div>
              </div>
              <div class="widget-content-left fsize-1">
                <div class="text-muted opacity-6">12 Month Subscription:</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  </div>
  </div>
  <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>



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
    background-size: cover;
    width: 100%;
    height: 100%;
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px);
  }
</style>

</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>