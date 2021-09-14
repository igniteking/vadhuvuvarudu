<?php
include_once("connection/header_inc.php");
include_once("connection/db.php");
?>
<title>Dashboard - Admin Creation | Billing</title>
<div style="background: #001d3d;">
    <div id="margin-setter2">
        <div style="padding: 30px;">
            <f style='font-size: 28px; font-weight: 700; color: #fff;'>Admin Creation</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px;'>
        <div class='flex-container'>
            <div style="flex-grow: 1">
                <div style='padding: 15px; border: 2px solid #780000; border-radius: 10px;'>
                <style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #780000;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #c1121f;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php
        $reg = @$_POST['reg'];
        $un = strip_tags(@$_POST['admin_name']);
        $em = strip_tags(@$_POST['email']);
        $password = strip_tags(@$_POST['admin_password']);
        if ($reg) {
            $sql = "INSERT INTO `admin` (`id`, `admin_name`, `email`, `admin_password`) VALUES (NULL, '$un', '$em', '$password')";
            $rt = mysqli_query($conn, $sql);

            if ($rt) {
                echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
            } else {
                echo "<h1> ERROR!</h1> " . $sql;
            }
        }

    ?>
<div class="container">
  <form method="post" action="create_admin.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">Admin Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="admin_name" placeholder="Admin Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">E-mail</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="E-mail..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Password</label>
      </div>
      <div class="col-75">
      <input type="text" id="lname" name="admin_password" placeholder="Password..">
      </div>
    </div><br>
    <div class="row">
      <input type="submit" name="reg" value="Submit">
    </div>
  </form>
</div>

</div>  
</div>