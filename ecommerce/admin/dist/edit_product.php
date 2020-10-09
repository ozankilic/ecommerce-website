<?php
include "db_connection.php";
$name = $_POST['name'];
$category =  $_POST['category'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$stock_code = $_POST['stock_code'];
$src = $_POST['src'];
$productId = $_POST['productId'];
$imageSrc = $_POST['imageSrc'];

if($imageSrc !== 'Hata'){
$categorySql = "UPDATE product_categories SET category_id = ".$category." WHERE product_id = ".$productId;
$categoryResult = mysqli_query($mysqli,$categorySql);

$imageSql = "UPDATE images SET src = '".$imageSrc."' WHERE product_id = ".$productId;
$imageResult = mysqli_query($mysqli,$imageSql);

$sql = "UPDATE products SET name = '".$name."' ,  stock_code = '".$stock_code."' , price = '".$price."' , status = '".$stock."' WHERE id = ".$productId;
$result = mysqli_query($mysqli,$sql);

echo"Update successful";
}else{
    echo $imageSrc."\nDesteklenmeyen dosya biçimi veya varolmayan dosya";
}