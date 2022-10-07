<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/Product.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/ModelProduct.php");

$categories = "";
$products = "";
$str_cat = "";

$db = new DataBase();
$prd = new Product();

$cat = $db->fetchAll("SELECT cat_id FROM categories");

if (is_numeric($_POST['cat']) && $_POST['cat'] > 0 && $_POST['cat'] <= count($cat))
{
    $str_categ = $db->fetchOne("SELECT cat_name FROM categories WHERE cat_id = {$_POST['cat']}");
    $str_cat = $str_categ['cat_name'];
    $prods = $prd->getProductsCatId($_POST['cat'],$_POST['sort']);
    foreach ($prods as $value)
    {
        $mod = new ModelProduct();
        $products .= $mod->getModelProduct($value);
    }
}
$json = ['products'=>$products,'str_cat'=>$str_cat,'post'=>$_GET];
echo json_encode($json);