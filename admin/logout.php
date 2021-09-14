<?php
include_once("database/phpmyadmin/connection.php");
session_unset();
session_destroy();
header("Location: login.php");
