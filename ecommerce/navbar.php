<?php
include "db_connection.php";

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){

    $id=$_SESSION['id'];
    $query = "select first_name from users where id = '$id' ";
    $result = mysqli_query($mysqli,$query);
    $row=mysqli_fetch_row($result);
?>
    <li><a href="#"><i class="fa fa-user"></i> Welcome <?= $row[0] ?> </a></li>
    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
    <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
    <li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>

<?php
}else{?>
    <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
	<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
	<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
	<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
	<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
    <?php }