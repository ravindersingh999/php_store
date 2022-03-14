<?php
session_start();
include("classes/DB.php");
include("classes/cart.php");
$id = $_POST['proId'];

if (isset($_POST['delete'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        $product = json_decode($v);
        // echo $product->id;
        if ($id == $product->id) {
            unset($_SESSION['cart'][$k]);
        }
    }
    header("location:cart.php");
}
