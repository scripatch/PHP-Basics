
<?foreach ($goods as $good): ?>
<div>
    <a href="/item/<?=$good["id"]?>">
    <b><?=$good['name']?></b><br>
    <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
    Цена: <?=$good['price']?><br>
    <button data-id="<?=$good["id"]?>" class="buy">Купить</button><hr>
</div>
<? endforeach; ?>

<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/buy/'+id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                //document.getElementById(id).remove();
            })();
        })
    });

</script>
