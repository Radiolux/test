<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
    <link rel="stylesheet" href="css/main.css">
    <script language="JavaScript" src="/js/main.js?<?php echo rand(10000,99999);?>" type="text/javascript"></script></head>
<body onload="LoadPage()">
<div class="main">
    <div id="mask"></div>
    <div id="tocart">
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/scripts/win_to_cart.php");
        ?>
    </div>
    <div class="left_column">
        <div id="box-categories">
        </div>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/scripts/categories.php");
        ?>
    </div>
    <div class="right_column">
        <div class="selector">
            <select id="sel" onchange="RefreshPage()">
                <option value="price" selected>спочатку дешевші</option>
                <option value="prod_name">по алфавіту</option>
                <option value="date">спочатку нові</option>
            </select>
        </div>
        <div class="cat-line">Категорія товару&nbsp;>>&nbsp;
            <span class="cat-name" id="box-cat-name">
            </span>
        </div>
        <div id="box-products">
        </div>
    </div>
</div>
<!--<script type="text/javascript">RefreshPage();</script>-->
</body>
</html>
