<?php

include "db_connection.php";
session_start();

$password = $_POST['password'];
$email = $_POST["email"];

if (empty($password) || empty($email)) {
        echo 'Please fill to null fields';
        exit();
}
if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid Email';
    exit();
}

    $query = "select id from users where mail = '$email' and password = '$password' and user_type = '2'";
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) === 1){
        $result = mysqli_fetch_row($result);
        $_SESSION['adminId'] = $result[0];
        echo 'success';
    }else{
        echo "wrong password or id";
    }

    
