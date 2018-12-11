<? if ($auth!=="No active users"):?>
    <div>Вы авторизованы</div>
    <div class="main_user">Main user:<?=$auth?></div>
    <a href="/logout" class="logout">Logout</a>

<? endif;?>
<? if($auth==="No active users"):?>
    <div class="main_user">Main user:No active users</div>
    <form action="/login" method="post">
        <dl>
            <dt class="dl_desc">Sign in:</dt>
            <dt>Name</dt>
            <dd><input type="text" name="name"></dd>
            <dt>Password</dt>
            <dd><input type="text" name="password"></dd>
            <dt><input type="submit" value="Sign in"></dt>
        </dl>
    </form>
    <form action="/newuser" method="post">
        <dl>
            <dt class="dl_desc">Add new user:</dt>
            <dt>Name</dt>
            <dd><input type="text" name="new_name"></dd>
            <dt>Password</dt>
            <dd><input type="text" name="new_password"></dd>
            <dt><input type="submit" value="Sign up"></dt>
        </dl>
    </form>
<? endif;?>



