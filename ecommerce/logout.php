<?php
include "db_connection.php";
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['loggedout'] = true;
$id = $_SESSION['id'];
$cartDestroyQuery = "DELETE FROM baskets WHERE baskets.user_id = ".$id;
$cartDestroyResult = mysqli_query($mysqli,$cartDestroyQuery);
var_dump($cartDestroyResult);
$_SESSION['id'] = "";
header("Location: index.php");
