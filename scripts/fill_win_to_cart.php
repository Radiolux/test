<?php
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/Product.php");

$prd = new Product();
$prods = $prd->getProductId($_POST['prod_id']);

$json = ['product'=>$prods];
echo json_encode($json);
