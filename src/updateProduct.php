<?php
session_start();
include("classes/DB.php");
// include("classes/product.php");

if (isset($_POST['update'])) {
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $des = $_POST['p_des'];
    
    $sql = DB::getInstance()->prepare("UPDATE products SET product_name = '$name', product_price = '$price', product_description = '$des' WHERE product_id = '$id' ");
    $sql->execute();
    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    header('location:products.php');
}
