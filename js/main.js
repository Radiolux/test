function filter_input(e,regexp)
{
    e=e || window.event;
    var target=e.target || e.srcElement;
    var isIE=document.all;

    if (target.tagName.toUpperCase()=='INPUT')
    {
        var code=isIE ? e.keyCode : e.which;
        if (code<32 || e.ctrlKey || e.altKey) return true;

        var char=String.fromCharCode(code);
        if (!regexp.test(char)) return false;
    }
    return true;
}
// Функція перевіряє GET-параметри, перемикає селектор в потрібну позицію
// та викликає функцію завантаження товару з вибраними параметрами
function LoadPage(cat,sort)
{
    let url = new URL(window.location);
    if (url.searchParams.has('sort'))
    {
        let sel = document.getElementById('sel');
        //alert(sel.length);return;
        for (i=0; i<sel.length; i++)
        {
            if (sel.options[i].value == url.searchParams.get('sort'))
            {
                sel.selectedIndex = i;
            }
        }
    }
    if (url.searchParams.has('cat'))
    {
        RefreshPage(url.searchParams.get('cat'));
    }

}

// Функцію завантаження товару з вибраними параметрами
function RefreshPage(cat="")
{
    let request;
    let url = new URL(window.location);
    let sel = document.getElementById('sel').selectedIndex;
    let opt = document.getElementById('sel').options;

    if ((cat == "") && (url.searchParams.has('cat'))) cat = url.searchParams.get('cat');
    url.searchParams.set('cat',cat);
    url.searchParams.set('sort',opt[sel].value);
    history.pushState({}, null, url.origin+url.pathname+url.search);

    if(window.XMLHttpRequest){request = new XMLHttpRequest();}
    else if(window.ActiveXObject){request = new ActiveXObject("Microsoft.XMLHTTP");}
    else {return;}
    request.onreadystatechange = function()
    {
        if (request.readyState==4)
        {
            if(request.status==200)
            {
                let answer = JSON.parse(request.responseText.trim());
                //document.getElementById('box-categories').innerHTML = answer.categories;
                document.getElementById('box-cat-name').innerHTML = answer.str_cat;
                document.getElementById('box-products').innerHTML = answer.products;
                //console.log(answer)
            }
            else if(request.status==404){alert("Ошибка: запрашиваемый скрипт не найден!");}
            else {alert("Ошибка: сервер вернул статус: "+ request.status);}
        }
    }
    request.open("POST","../scripts/products.php", true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send("command=sorting&sort="+opt[sel].value+"&cat="+cat);

}
// Відкрити вікно додавання до кошика
function OpenWinToCart(prod_id)
{
    let request;
    if(window.XMLHttpRequest){request = new XMLHttpRequest();}
    else if(window.ActiveXObject){request = new ActiveXObject("Microsoft.XMLHTTP");}
    else {return;}
    request.onreadystatechange = function()
    {
        if (request.readyState==4)
        {
            if(request.status==200)
            {
                let answer = JSON.parse(request.responseText.trim());
                document.getElementById('prod_id_tocart').innerHTML = answer.product['prod_id'];
                document.getElementById('prod_name_tocart').innerHTML = answer.product['prod_name'];
                document.getElementById('price_tocart').innerHTML = answer.product['price']+' грн.';
                document.getElementById('mask').style.display = 'block';
                document.getElementById('tocart').style.display = 'block';
            }
            else if(request.status==404){alert("Ошибка: запрашиваемый скрипт не найден!");}
            else {alert("Ошибка: сервер вернул статус: "+ request.status);}
        }
    }
    request.open("POST","../scripts/fill_win_to_cart.php", true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send("prod_id="+prod_id);
}

// Закрити вікно додавання до кошика
function CloseWinToCart()
{
    document.getElementById('tocart').style.display = 'none';
    document.getElementById('mask').style.display = 'none';
}