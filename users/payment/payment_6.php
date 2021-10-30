<?php
include('../database/phpmyadmin/connection.php');
?>
<?php
echo "<h1> Please Wait!<br>We are processing your transaction!</h1>";
$payment_id = $_GET['payment_id'];
$email;
$select_query = "SELECT * FROM users WHERE email = '$email'";
$select_query_result = mysqli_query($conn, $select_query);
while($rows = mysqli_fetch_assoc($select_query_result )){
    $user_id = $rows['id'];
    $user = $rows['username'];
    $email = $rows['email'];
    $mobile = $rows['mobile'];
    $added_on=date('Y-m-d h:i:s');
    $payment_status="pending";
    $type = 'premium';
    $days = "180";
}
$user_id;
mysqli_query($conn,"insert into payments(name,type,email,payment_id,added_on,days) values('$user','$type','$email', '$payment_id','$added_on', '$days')");
echo "<meta http-equiv=\"refresh\" content=\"2; url=../index.php\">";
?>