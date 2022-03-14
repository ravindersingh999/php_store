<?php
session_start();
include("classes/DB.php");
include("classes/cart.php");
$id = $_GET['id'];
// echo '<pre>';
// print_r($_SESSION['cart']);
// echo '</pre>';
foreach($_SESSION['cart'] as $k=>$v) {
    $product = json_decode($v);
    $name = $v["product_name"];
    echo $name;
}
