<?php 

function getItems($mysqli){
         $id = $_SESSION['id'];
        $query = "SELECT basket_items.product_id, basket_items.quantity
        FROM baskets
        INNER JOIN users on baskets.user_id = users.id
        INNER JOIN basket_items on baskets.id = basket_items.basket_id
        WHERE users.id = '$id'"; 
        $result = mysqli_query($mysqli, $query);
        return $result;
}

