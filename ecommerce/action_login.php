<?php

include "db_connection.php";
session_start();

$password = md5($_POST['password']);
$email = $_POST["email"];

if (empty($password) || empty($email)) {
        echo 'Please fill to null fields';
        exit();
}

if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid Email';
    exit();
}

    $query = "select mail from users where mail = '$email' and password = '$password'";
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) === 1){
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        echo "success";
        exit();
    }else{
        $_SESSION['wronginfo'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        echo "wrong password or id";
    }

    
