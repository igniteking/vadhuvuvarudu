<?php include_once("connection/db.php");?>

<?php

$user_id = $_GET['user_id']; // get id through query string
$delete_user_query = "DELETE FROM `users` WHERE `id` = '$user_id'";
$del_query = mysqli_query($conn, $delete_user_query); // delete query
if($del_query)
{
    mysqli_close($conn); // Close connection
    echo "deleted record"; // display error message if not delete
    header("location:user_profile.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>