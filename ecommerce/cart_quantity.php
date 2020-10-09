<?php 
include "db_connection.php";

$productId = $_POST['productId'];
$add = $_POST['add'];
$quantity = $_POST['quantity'];

if($add == "true"){
    $addingQuery = "UPDATE basket_items SET quantity = quantity + 1 WHERE product_id = ".$productId;
    $addingQueryResult = mysqli_query($mysqli, $addingQuery);
}elseif($add == "false" && $quantity>1){
    $addingQuery = "UPDATE basket_items SET quantity = quantity - 1 WHERE product_id = ".$productId;
    $addingQueryResult = mysqli_query($mysqli, $addingQuery);
}else{
    $deletingQuery = "DELETE FROM basket_items WHERE product_id = ".$productId;
    $deletingQuery = mysqli_query($mysqli,$deletingQuery);
}
