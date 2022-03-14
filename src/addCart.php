<?php
session_start();
include("classes/DB.php");
include("classes/cart.php");
$id = $_GET["id"];
// echo $id;
$sql = DB::getInstance()->prepare("SELECT * FROM products WHERE product_id = '$id'");
$sql->execute();
$result = $sql->setFetchMode(PDO::FETCH_ASSOC);
// print_r($result);

foreach ($sql->fetchAll() as $k => $v) {
    $id = $v['product_id'];
    $name = $v['product_name'];
    $price = $v['product_price'];
    $image = $v['product_image'];
    $des = $v['product_description'];
    // echo $price;

    $product1 = new cart($id, $name, $price, $image, $des);
    // print_r($product1) ;
    $product1->addCart($product1);
    header("location:cart.php");
}
// echo "<pre>";
//         print_r($_SESSION);
//         echo "</pre>";

//         foreach($_SESSION['cart'] as $k => $v){
//             $pro=json_decode($v);
//             echo $pro->image;
//         }
