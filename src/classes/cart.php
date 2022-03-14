<?php
session_start();
// include("classes/DB.php");
class cart extends DB
{
    public $id;
    public $name;
    public $price;
    public $image;
    public $des;


    public function __construct($id, $name, $price, $image, $des)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->des = $des;
    }

    public function addCart($product1)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            array_push($cart, json_encode($product1));
            $_SESSION['cart'] = $cart;
            
        }
        else {
            $_SESSION['cart'] = array();
        }
    //     echo "<pre>";
    //     print_r($_SESSION);
    //     echo "</pre>";
    }
}
