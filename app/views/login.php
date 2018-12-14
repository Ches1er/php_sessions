<h1>Login</h1>
<form action="/login_handle" method="post">

    <?php if (!empty($_SESSION["error"])):?>
        <div class="error"><?=$_SESSION["error"]?></div>
    <?php endif;?>

    <dl>
        <dt class="dl_desc">Sign in:</dt>
        <dt>Name</dt>
        <dd><input type="text" name="login" value="<?=@$_SESSION["repeat_name"]?>"></dd>
        <dt>Password</dt>
        <dd><input type="password" name="password"></dd>
        <dt><input type="submit" value="Sign in"></dt>
    </dl>
</form>