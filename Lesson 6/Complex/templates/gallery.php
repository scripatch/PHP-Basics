<h2>Галерея</h2>
<? foreach ($images as $item): ?>

    <a href="/image/?id=<?=$item['id']?>"><img src="/images/small/<?=$item['filename']?>"></a>

<?endforeach;?>