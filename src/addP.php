<?php
session_start();
include("classes/DB.php");
include("classes/product.php");
if (isset($_POST['add'])) {
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $image = $_POST['p_image'];
    $des = $_POST['p_des'];
    
    if (empty($id) || empty($name) || empty($price) || empty($image) || empty($des)) {
        $_SESSION['add_msg'] = "*Please fill all fields";
        header('location:add-product.php');
    } else {
        $product1 = new Product($id, $name, $price, $image, $des);
        $product1->addProduct($product1);
        header('location:products.php');
    }
}
