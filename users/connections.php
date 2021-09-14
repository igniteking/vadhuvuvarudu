<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
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
      <h2 class="col-md-4" id="subhead">Connections! <lord-icon
                      src="https://cdn.lordicon.com/rjzlnunf.json"
                      trigger='loop'
                      delay='1000'
                      colors='primary:#e63946,secondary:#ffffff'
                      style='width:50px;height:50px'>
                  </lord-icon></h2>
      <?php
        $query = "SELECT * from request WHERE user_to = '$user_id'  AND `subject` = 'completed'";
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
        $id = $rows['id'];
        $name = $rows['username'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
        $dob = $rows['date'];
        $gender = $rows['gender'];
    	  $country = $rows['country'];
        $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE id=$id");
        $get_pic_row = mysqli_fetch_assoc($check_pic);
        $profile_pic_db = $get_pic_row['profile_pic'];
        if ($profile_pic_db == "") {
          $profile_pic2 = "";
          echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
          <div class='col-sm' style='padding: 20px;'><img src='images/user.png' width='60px;' height='60px' style='float: right;'></img>
          <form class='col-sm' method='POST' action='connections.php'>
          <input type='submit' value='Delete Request' name='delete_request' style='float: right; margin-left: 30px; margin-right: 15%; width: 150px;' class='btn btn-outline-danger' />
          </form>
          <a href='profile_view.php?id=$id'><div class='col-sm'>
          <button style='float: right; margin-left: 30px; width: 150px;' class='btn btn-outline-primary'>View Profile</button>
          </div></a>
          <form class='col-sm' method='POST' action='connections.php'>
          <input type='submit' value='Delete Connection' name='delete_connection' style='float: right; margin-left: 70px; width: 190px;' class='btn btn-outline-secondary'>
          </form>
          <a href='profile_view.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
          ID#$name</a></div></div> E-mail : $email || User Type: $gender <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Date Of Birth : $dob
          </div></div></div>";
          }
          else{
            $profile_pic2 = "userdata/".$profile_pic_db;   
            echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
            <div class='col-sm' style='padding: 20px;'><img src='$profile_pic2' width='60px;' height='60px' style='float: right;'></img>
            <form class='col-sm' method='POST' action='connections.php'>
            <input type='submit' value='Delete Request' name='delete_request' style='float: right; margin-left: 30px; margin-right: 15%; width: 150px;' class='btn btn-outline-danger' />
            </form>
            <a href='profile_view.php?id=$id'><div class='col-sm'>
            <button style='float: right; margin-left: 30px; width: 150px;' class='btn btn-outline-primary'>View Profile</button>
            </div></a>
            <form class='col-sm' method='POST' action='connections.php'>
            <input type='submit' value='Delete Connection' name='delete_connection' style='float: right; margin-left: 70px; width: 190px;' class='btn btn-outline-secondary'>
            </form>
            <a href='profile_view.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
            ID#$name</a></div></div> E-mail : $email || User Type: $gender <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Date Of Birth : $dob
            </div></div></div>";
          }}}

  $delete_request = @$_POST['delete_request'];
    if ($delete_request){
      $delete_query = "DELETE FROM `request` WHERE `user_from` = '$user_from' AND `user_to` = '$user_to'";
      $delete_result = mysqli_query($conn, $delete_query);
      if($delete_result)
{
    echo "deleted record"; // display error message if not delete
    echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
}
else
{
    echo "Error deleting record"; // display error message if not delete
}}
$delete_connection_quesry = @$_POST['delete_connection'];
if ($delete_connection_quesry){
  $delete_connection_quesry = "UPDATE `request` SET `subject`='pending' WHERE `user_from` = '$user_from' AND `user_to` = '$user_to'";
  $delete_result = mysqli_query($conn, $delete_connection_quesry);
  if($delete_result)
{
echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
}
else
{
echo "Error deleting connection"; // display error message if not delete
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