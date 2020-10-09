<?php 
    include "db_connection.php";

    $productId = $_POST['productID'];
    $sql = 'delete from products where id = '. $productId;
    $sqlResult = mysqli_query($mysqli, $sql);
    echo $sqlResult;
    








