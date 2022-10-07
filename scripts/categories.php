<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/DataBase.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/Product.php");
$categories = "";
$prd = new Product();

$db = new DataBase();
$cat = $db->fetchAll("SELECT * FROM categories ORDER BY cat_id");
$categories .= "<ul>";
for ($i=0; $i < count($cat); $i++)
{
    $prods = $prd->getProductsCatId($cat[$i]['cat_id']);
    $categories .= "<li id='cat_".$cat[$i]['cat_id']."' onClick='RefreshPage(".$cat[$i]['cat_id'].");'>".$cat[$i]['cat_name']." (".count($prods).")"."</li>";
}
$categories .= "</ul>";
echo $categories;