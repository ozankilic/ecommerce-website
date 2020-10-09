<?php
function getFeatures($productCategory,$mysqli){
    $query = "SELECT p.id ,p.name, p.price, i.src  FROM products p inner join images i on p.id = i.product_id WHERE category_id = $productCategory ";
    $products = mysqli_query($mysqli, $query);
    return $products;
}

function getFeaturesId($productId,$mysqli){
    $query = "SELECT p.name, p.price, i.src FROM products p inner join images i on p.id = i.product_id WHERE p.id = $productId ";
    $products = mysqli_query($mysqli, $query);
    return $products;
}

function spesificProductSql($offset, $no_of_records_per_page, $maxValue, $minValue, $productClass){
    if($productClass == ""){
        return $productSpesificationSql = "SELECT p.id ,p.name, p.price, i.src  FROM products p inner join images i on p.id = i.product_id
        inner join product_categories on p.id = product_categories.product_id WHERE (price BETWEEN '$minValue' AND '$maxValue') LIMIT $offset, $no_of_records_per_page ";
    }else{
        return $productSpesificationSql = "SELECT p.id ,p.name, p.price, i.src  FROM products p inner join images i on p.id = i.product_id
        inner join product_categories on p.id = product_categories.product_id WHERE (product_categories.category_id = $productClass) AND (price BETWEEN '$minValue' AND '$maxValue') LIMIT $offset, $no_of_records_per_page ";
    }
}

    