<?php
include "db_connection.php";
session_start();
$_SESSION['adminId'] = "";
header("Location: login.php");
