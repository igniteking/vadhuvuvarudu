<?php include_once("connection/db.php"); ?>
<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
// get Users
$query = "SELECT * FROM users";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        $users[] = $rows;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Users.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Name', 'Gender', 'Date Of Birth', 'Religion', 'Mother Tongue', 'Caste', 'Country', 'Mobile Number', 'Email'));

if (count($users) > 0) {
    foreach ($users as $rows) {
        fputcsv($output, $rows);
    }
}
?>