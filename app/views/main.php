
<?php
if ($currentUser!==NULL):?>
    <div>Вы авторизованы</div>
    <div class="main_user">Main user:<?=$currentUser?></div>
    <a href="/logout" class="logout">Logout</a>
    <form action="/addcat" method="post">
        <dl>
            <dt><input type="text" name="cat_name"></dt>
            <dt><input type="submit"></dt>
        </dl>
    </form>

<?php endif;?>
<? if($currentUser===NULL):?>
    <div class="main_user">Main user:No active users</div>
    <a href="/login">Login</a>
    <a href="/signup">SignUp</a>
<?php endif;?>





