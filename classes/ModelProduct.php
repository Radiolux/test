<?php

class ModelProduct
{
    public function getModelProduct($arr)
    {
        return "
            <div class='ModelProduct'>
                <span>{$arr['prod_name']}</span> / 
                <span style='color: darkslateblue'>{$arr['price']} грн.</span> / 
                <span style='color: darkgrey'>{$arr['date']}</span>
                <input type='button' onclick='OpenWinToCart($arr[prod_id])' value='Купити' style='margin-left: 50px;'>
            </div>
            ";
    }
}