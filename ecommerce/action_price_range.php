<?php
session_start();

$_SESSION['maxPrice'] = $_POST['maxPrice'];
$_SESSION['minPrice'] = $_POST['minPrice'];
echo "fonksiyona girildi";