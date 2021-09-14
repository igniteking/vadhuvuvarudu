<?php
include_once("connection/header_inc.php");
include_once("connection/db.php");
?>
<!DOCTYPE html>
<title>Profile View - Home | Billing</title>
<html>
<div style="background: #001d3d;">
    <div id="margin-setter2">
        <div style="padding: 30px;">
            <f style='font-size: 28px; font-weight: 700; color: #fff;'>Profile</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px;'>
    <center><img class="image_mobile" src="images/user.png"></center>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<body>
<style>
img.sticky {
  position: -webkit-sticky;
  position: sticky;
  width: 250px;
}
@media only screen and (max-width: 600px) {
  img.sticky {
    display: none;
  }
}
@media only screen and (min-width: 600px) {
  img.image_mobile {
    display: none;
  }
}
</style>
    <img class="sticky" style="float: right;" src="images/user.png">
<div class='flex-container'>
  <div style="flex-grow: 1">
    <div style='padding: 12px;'>
  <?php
    $user_id = $_GET['user_id'];
    $fetch_users = "SELECT * FROM users WHERE id = '$user_id'";
    $fetch_result = mysqli_query($conn, $fetch_users);

    while ($rows = mysqli_fetch_assoc($fetch_result)) {
        $user_id = $rows['id'];
        $user_name = $rows['name'];
        $user_gender = $rows['gender'];
        $date_of_birth = $rows['dob'];
        $religion = $rows['religion'];
        $mother_tounge = $rows['mother_tongue'];
        $caste = $rows['caste'];
        $country = $rows['country'];
        $mobile_number = $rows['mobile'];
        $email = $rows['email'];
    }
    ?>

  <form action="/profile_view.php">
    
    <label for="fname">Name</label>
    <input type="text" id="fname" value="<?php echo $user_name;?>" name="firstname" placeholder="Your name.." disabled>

    <label for="lname">Gender</label>
    <input type="text" id="lname" value="<?php echo $user_gender;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Date Of Birth</label>
    <input type="text" id="lname" value="<?php echo $date_of_birth;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Religion</label>
    <input type="text" id="lname" value="<?php echo $religion;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Mother Tongue</label>
    <input type="text" id="lname" value="<?php echo $mother_tounge;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Caste</label>
    <input type="text" id="lname" value="<?php echo $caste;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Country</label>
    <input type="text" id="lname" value="<?php echo $country;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">Number</label>
    <input type="text" id="lname" value="<?php echo $mobile_number;?>" name="lastname" placeholder="Your last name.." disabled>

    <label for="lname">E-mail</label>
    <input type="text" id="lname" value="<?php echo $email;?>" name="lastname" placeholder="Your last name.." disabled>
  </form>
</div>

</body>
</html>