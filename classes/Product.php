<?php

require_once($_SERVER['DOCUMENT_ROOT']."/classes/DataBase.php");

class Product
{
    public $product = ['prod_id','name','price','cat_id','category'];
    public $prod_id;
    public $name;
    public $price;
    public $cat_id;
    public $category;

    public function getProductId($id)
    {
        $db = new DataBase();
        $sql = "SELECT * FROM products 
                INNER JOIN categories 
                ON categories.cat_id=products.cat_id 
                WHERE prod_id={$id}";
        $prod = $db->fetchOne($sql);
        return $prod;
    }

    public function getProductsCatId($cat_id, $sort = 'prod_id')
    {
        $db = new DataBase();
        if ($sort == 'date') $desc = " DESC"; else $desc = "";
        $sql = "SELECT * 
                FROM products 
                WHERE cat_id={$cat_id}
                ORDER BY {$sort}".$desc;
        $prod = $db->fetchAll($sql);
        return $prod;
    }

    public function getProductsAll($sort = 'price')
    {
        $db = new DataBase();
        $sql = "SELECT * 
                FROM products 
                ORDER BY {$sort}";
        $prod = $db->fetchAll($sql);
        return $prod;
    }

}
