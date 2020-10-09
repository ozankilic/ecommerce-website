<?php

include "db_connection.php";
session_start();

$password = ($_POST['password']);
$email = $_POST["email"];

if (empty($password) || empty($email)) {
        echo 'Please fill to null fields';
        exit();
}else{
    $password = md5($_POST['password']);
}

if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid Email';
    exit();
}

    $query = "select id from users where mail = '$email' and password = '$password'";
    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) === 1){
        $_SESSION['loggedin'] = true;
        $result = mysqli_fetch_row($result);
        $_SESSION['id'] = $result[0];

        //Cart oluşturulması
        $cartStartQuery = "INSERT INTO baskets(user_id) VALUES(".$result[0].")";
        $cartStartResult = mysqli_query($mysqli,$cartStartQuery);
        echo 'success';
    }else{
        echo "wrong password or id";
    }

    
