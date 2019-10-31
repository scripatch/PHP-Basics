<? if (!$allow):?>
    <form action="/auth/login/" method="post">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input type='submit' name='send'>
    </form>
<?else:?>
    Добро пожаловать, <?=$user?> <a href='/auth/logout/'>выход</a><br>
<?endif;?>

<a href="/">Главная</a>
<a href="/news/">Новости</a>
<a href="/catalog/">Каталог</a>
<a href="/feedback/">Отзывы</a>
<a href="/basket/">Корзина <span id="count"><?=$count?></span></a>

