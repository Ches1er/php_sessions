<div>Main user:<?=$active_user?></div>
<? if ($auth):?>
    <div>Вы авторизованы</div>
<? endif;?>
<? if(!$auth):?>
    <form action="/login" method="post">
        <input type="text" name="name">
        <input type="submit" value="Enter">
    </form>
    <form action="/user" method="post">
        <input type="text" name="new_name">
        <input type="submit" value="Sign up">
    </form>
<? endif;?>



