<h2>Корзина</h2>
<?foreach ($goods as $good): ?>
    <div id="<?=$good['basket_id']?>">
        <a href="/item/<?=$good["id"]?>">
            <b><?=$good['name']?></b><br>
            <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
        Цена: <?=$good['price']?><br>
        <button data-id="<?=$good["basket_id"]?>" class="buy">Удалить</button><hr>
    </div>
<? endforeach; ?>

Общая стоимость: <span id="sum"><?=$sum?></span><br>

<h2>Оформите заказ</h2>
<form action="/order/" method="post">
    <input placeholder="Ваше имя" type="text" name="name">
    <input placeholder="Телефон" type="text" name="phone">
    <input placeholder="Адрес доставки" type="text" name="address">
    <input type="submit" name="checkout">
</form>



<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/delete/'+id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('sum').innerText = answer.sum;
                console.log(document.getElementById(id));
                document.getElementById(id).remove();
            })();
        })
    });

</script>
