<div class="btn-close" onclick="CloseWinToCart();">✖</div>
<div id="prod_id_tocart" style="display: none;"></div>
<div id="prod_name_tocart" style="padding: 65px 20px 20px 20px;"></div>
<div id="price_tocart" style="padding: 20px;"></div>
<div id="qty_tocart" style="padding: 20px;">
    <input type="text" id="qty_tocart" maxlength="7" size="7" value="1" onKeyPress="return filter_input(event,/\d/)"> шт.
</div>
<div style="position: absolute; bottom: 25px; right: 25px">
    <input type="button" value="Додати до кошика">
    <input type="button" value="Відмінити" onclick="CloseWinToCart();">
</div>