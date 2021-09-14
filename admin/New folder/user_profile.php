<?php
include_once("connection/header_inc.php");
include_once("connection/db.php");
?>
<title>Dashboard - Home | Billing</title>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<div style="background: #001d3d;">
    <div id="margin-setter2">
        <div style="padding: 30px;">
            <f style='font-size: 28px; font-weight: 700; color: #fff;'>Dashboard</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px;'>
    <?php
    $fetch_users = "SELECT * FROM users";
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
    ?>
            <div class="profile_cards">
                <div style='padding: 15px;'>
                    <img src="images/user.png" style="width: 80px; float:left; margin-bottom: 10px;" />
                    <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Id:- <?php echo $user_id; ?></f><br>
                    <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Name:- <?php echo $user_name; ?></f><br>
                    <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Gender:- <?php echo $user_gender; ?></f><br><br><br><br>
                    <a href="profile_view.php?user_id=<?php echo $user_id?>"><button style="margin-left: 10px; border: 2px solid blue; padding: 5px; background: none; width: 95%; color: blue; font-size: 17px;">View</button></a><br><br>  
                    <a href="delete_user.php?user_id=<?php echo $user_id?>"><button style="margin-left: 10px; border: 2px solid red; padding: 5px; background: none; width: 95%; color: red; font-size: 17px;">Delete</button></a>
                </div>
            </div><?php }?>
        </div>
    </div>
</div>