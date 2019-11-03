<? if (!$allow):?>
    <form action="/auth/login/" method="post">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input type='submit' name='send'>
        <input type="hidden" name='redirect' value="<?=$_SERVER['REQUEST_URI']?>">
    </form>
<?else:?>
    Добро пожаловать, <?=$user?> <a href='/auth/logout/?redirect=<?=$_SERVER['REQUEST_URI']?>'>выход</a><br>
<?endif;?>

<a href="/">Главная</a>
<a href="/news/">Новости</a>
<a href="/catalog/">Каталог</a>
<a href="/feedback/">Отзывы</a>
<a href="/basket/">Корзина <span id="count"><?=$count?></span></a>

