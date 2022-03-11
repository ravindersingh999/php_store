<?php
session_start();
require_once('classes/DB.php');
class Product extends DB
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

    public function addProduct()
    {
        DB::getInstance()->exec("INSERT INTO products (product_id, product_name, product_price, product_image, product_description) VALUES('$this->id', '$this->name', '$this->price', '$this->image', '$this->des')");
    }
}
