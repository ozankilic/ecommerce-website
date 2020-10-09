<?php
include "db_connection.php";
session_start();


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
$productId = $_POST['productId'];
$userId = $_SESSION['id'];

//Session'daki user_id'den basket id bulunması
$basketIdQuery = "SELECT id FROM baskets WHERE user_id = ". $userId;
$basketIdResult = mysqli_query($mysqli,$basketIdQuery);
$basketIdArray = mysqli_fetch_row($basketIdResult);
$basketId = $basketIdArray[0];


//basket'te product önceden girildi mi bakılması
$basketControlQuery = "SELECT * FROM basket_items WHERE basket_id = ".$basketId." and product_id = ".$productId;
$basketControlResult = mysqli_query($mysqli,$basketControlQuery);
$basketControlArray = mysqli_fetch_row($basketControlResult);
if(empty($basketControlArray)){
    //basketId'ye seçili product'ın eklenmesi
    $basketAddingQuery = "INSERT INTO basket_items(basket_id, product_id, quantity) 
    VALUES(".$basketId.", ".$productId.", 1)";
    $basketAddingResult = mysqli_query($mysqli,$basketAddingQuery);

    echo  "Successful. Product is added to your cart";
    exit();
}else{
    //basketId'de zaten varolan product'ın quantitiy'sinin bir artırılması
    $basketAddingMoreQuery = "UPDATE basket_items 
    SET quantity = quantity + 1 
    WHERE product_id = ".$productId;
    $basketAddingMoreResult = mysqli_query($mysqli,$basketAddingMoreQuery);

    echo  "Successful.You have already added this product. Quantity increased 1";
    exit();
}
exit();
}

echo "You must login first";
exit();
?>