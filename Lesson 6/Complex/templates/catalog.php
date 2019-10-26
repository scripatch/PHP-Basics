<h2>Каталог</h2>

<div>
    <? foreach ($catalog as $item): ?>
        <div>
            <a href="/goods/<?=$item['id']?>"><?=$item['name']?></a><br>
            <a href="/goods/<?=$item['id']?>"><img src="/images/small/<?=$item['image']?>" alt=""></a>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <? endforeach; ?>

</div>
