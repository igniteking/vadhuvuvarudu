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
        $query = "SELECT * from users";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $user_id = $rows['id'];
        $user = $rows['username'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
        $active = $rows['active'];
        if($active == 1) {
            $active = "active";
            $dialog = "";
        } else {
            $active = "Verify Your Email!";
            $dialog = "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>$active <a href='resend.php?id=$user_id' style='color: #eee'><u>Resend Verification Code!</u></a></p>";
        }
        $bio = $rows['bio'];
        $state = $rows['state'];
        $city = $rows['city'];
        $postalcode = $rows['postalcode'];
        $education = $rows['education'];
        $country = $rows['country'];
        $additional = $rows['additional'];
        }
    ?>
  	<title>Dashboard - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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
      <li class="nav-item">
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
        <li class="nav-item">
        <div class="input-group">

        </li>
      </ul>
    </div>
  </div>
</nav>
<h2 class="mb-4">Hi! <?php echo $admin_name;?></h2>
<?php
$sql="SELECT gender FROM users WHERE gender ='male' ORDER BY gender";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $groom=mysqli_num_rows($result);
 echo "<div class='row mt-3'>
  <div id='card' class='col-md-4' style='margin-top: 15px;'>
  <div id='flip-card'>
    <div id='flip-card-front1'>Groom</div>
    <div id='flip-card-back'><p style='font-size: 40px; color: #4285F4;'>$groom</p></div>
  </div>
</div>";
  }
  // Free result set
?>
        
        <?php
$sql="SELECT gender FROM users WHERE gender ='female' ORDER BY gender";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $bride=mysqli_num_rows($result);
 echo "  <div id='card' class='col-md-4' style='margin-top: 15px;'>
 <div id='flip-card'>
   <div id='flip-card-front2'>Bride</div>
   <div id='flip-card-back'><p style='font-size: 40px; color: #DB4437;'>$bride</p></div>
 </div>
</div>";
  }
  // Free result set
?>
      <!-- // code here // -->
      <div id='card' class='md-4'>
      <div class="mt-5"><a href="download.php"><button class="btn btn-success profile-button" type="submit" name="upload_cover">
      <lord-icon
    src="https://cdn.lordicon.com/wxnxiano.json"
    trigger="morph-two-way"
    colors="primary:#ffffff,secondary:#ffffff"
    style="width:50px;height: 50px">
</lord-icon> Download .csv</button></a></div>
      
 </div>

<style>

  body {
  background: #e2e1e0;
}
.card {
  background: #fff;
  border-radius: 2px;
  display: inline-block;
  height: 300px;
  margin: 1rem;
  position: relative;
  width: 300px;
}

#python {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

#python:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
  .card.user-card {
      border-top: none;
      -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
      -webkit-transition: all 150ms linear;
      transition: all 150ms linear;
  }
</style>
        
      </div>
		</div>

<style>
  #back {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  color: #222;
  }
#boss {
  padding: 10px;
  border-radius: 25px;
  height: 300px;
  overflow-y: scroll;
  box-shadow: 0px 25px 10px -15px 
}
#boss::-webkit-scrollbar {
  display: none;
  }
  #boss {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
<style>
  body::-webkit-scrollbar {
  display: none;
  }
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#flip-card-back::-webkit-scrollbar {
  display: none;
  }
  #flip-card-back {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#card {
  width: 100%;;
}

#card , #flip-card {
  width: 100%;
  height: 200px;
}

#flip-card {
  transition: transform .5s ease-in-out;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
}

#flip-card:Hover {
  transform: rotateY(180deg);
}

#flip-card-front {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-back {
  position: absolute;
  top: 0;
  left: 0;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-front, #flip-card-back {
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
}

#flip-card-back {
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  transform: rotateY(180deg);
  color: #222;
}

#flip-card-front {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #e6e6ea;
  color: #111;
}

  </style>



    <style>
      body::-webkit-scrollbar {
  display: none;
  }
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#card {
  max-width: 100%;
  perspective: 1000px;
}

#card , #flip-card {
  width: 100%;
  height: 200px;
}

#flip-card {
  transition: transform .5s ease-in-out;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
}

#flip-card:Hover {
  transform: rotateY(180deg);
}

#flip-card-front1, #flip-card-front2, #flip-card-front3, #flip-card-back {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

#flip-card-front1, #flip-card-front2, #flip-card-front3, #flip-card-back {
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
}

#flip-card-back {
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  transform: rotateY(180deg);
  color: #222;
}

#flip-card-front1 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #4285F4;;
  color: #fff;
  font-size: 24px;
}
#flip-card-front2 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #DB4437;
  color: #fff;
  font-size: 24px;
}
#flip-card-front3 {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #F4B400;
  color: #fff;
  font-size: 24px;
}

    </style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>