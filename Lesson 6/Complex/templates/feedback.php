<h2>Отзывы</h2>

<?=$feedback['messages']?>

<?foreach ($feedback['result'] as $value): ?>

    <p><?=$value['name']?>: <?=$value['message']?>
        <a href="/feedback/edit/<?=$value['id']?>">[edit]</a>
        <a href="/feedback/delete/<?=$value['id']?>">[delete]</a>
    </p>

<?endforeach;?>

<form action="/feedback/<?=$feedback['action_type']?>/<?=$feedback['id']?>" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$feedback['name']?>"><br>
    <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$feedback['message']?>"><br>
    <input type="submit" value="<?=$feedback['buttonName']?>">
</form>


