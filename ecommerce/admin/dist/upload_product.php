<?php
include "db_connection.php";
$name = $_POST['name'];
$category =  $_POST['category'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$stock_code = $_POST['stock_code'];
$src = $_POST['src'];
$productId = rand();
$imageSrc = $_POST['imageSrc'];

if($imageSrc !== 'Hata'){
$sql = "INSERT INTO products (name,  stock_code, price, status, id) VALUES('".$name."', '".$stock_code."', '".$price."', '".$stock."', ".$productId.")";
$result = mysqli_query($mysqli,$sql);

$categorySql = "INSERT INTO product_categories (category_id, product_id) VALUES(".$category.",".$productId.")";
$categoryResult = mysqli_query($mysqli,$categorySql);

$imageSql = "INSERT INTO images (src, product_id) VALUES('".$imageSrc."', ".$productId.")";
$imageResult = mysqli_query($mysqli,$imageSql);



echo"Upload successful"."cat= ".$categoryResult." img=".$imageResult." prod=".$result;
}else{
    echo $imageSrc."\nDesteklenmeyen dosya biçimi veya varolmayan dosya";
}