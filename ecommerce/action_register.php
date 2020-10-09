<?php

include "db_connection.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];


if (empty($firstname) || empty($lastname) || empty($password) || empty($email)) {
        echo 'Please fill to null fields';
        exit();
}else{
    $password = md5($_POST["password"]);
}

if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid Email';
    exit();
}

$query = "INSERT INTO ecommerce.users(first_name, last_name, mail, password) 
        VALUES('$firstname','$lastname','$email','$password')";

$result = mysqli_query($mysqli, $query);

if(!$result) {
    echo 'Query error: ' . mysqli_error($mysqli);
    exit();
}

session_start();
    $_SESSION['registered'] = true;
    $_SESSION['firstname'] = $_POST['firstname'];