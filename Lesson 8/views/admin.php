<?php

$orders_id = "";

if (is_admin()) : ?>
    <h2>Админка</h2>

    <? foreach ($items as $item): ?>
        <? if ($item['orders_id'] != $orders_id) :?>
            <?php $orders_id = $item['orders_id']; ?>
            <h3>Заказ №<?= $orders_id ?>. Покупатель: <?=$item['orders_name']?>, телефон: <?=$item['orders_phone']?>, адрес: <?=$item['orders_address']?>. Статус <span id="<?=$item['orders_id']?>"><?=ORDER_STATUS[$item['orders_status']]?></span>
                <button data-id="<?=$item['orders_id']?>" class="checkout-btn">Оформить</button>
                <button data-id="<?=$item['orders_id']?>" class="cancel-btn">Отменить</button></h3>
        <? endif; ?>
        <h5>Товар № <?= $item['goods_id'] ?> название <?= $item['goods_name'] ?> цена <?= $item['goods_price'] ?></h5>
    <? endforeach; ?>

    <script>
        let buttons = document.querySelectorAll('.cancel-btn');

        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                (async ()=>{
                    const response = await fetch('/api/cancel/'+id);
                    const answer = await response.json();
                    document.getElementById(id).innerText = "<?=ORDER_STATUS[3]?>";
                })();
            })
        });

        buttons = document.querySelectorAll('.checkout-btn');

        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                (async ()=>{
                    const response = await fetch('/api/checkout/'+id);
                    const answer = await response.json();
                    document.getElementById(id).innerText = "<?=ORDER_STATUS[2]?>";
                })();
            })
        });

    </script>

<? else : ?>
    Войдите под амдинистратором!
<? endif; ?>


