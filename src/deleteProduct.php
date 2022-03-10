<?php
include("classes/DB.php");
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = DB::getInstance()->prepare("DELETE FROM products where product_id = '$id'");
    $sql->execute();
    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
    header('location:products.php');
}
