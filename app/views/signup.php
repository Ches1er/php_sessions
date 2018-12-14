<h1>Sign Up</h1>
<form action="/signup_handle" method="post">
    <?php if (!empty($_SESSION["error"])):?>
        <div class="error"><?=$_SESSION["error"]?></div>
    <?php endif;?>
    <dl>
        <dt class="dl_desc">Sign in:</dt>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?=@$_SESSION["repeat_name"]?>"></dd>
        <dt>Password</dt>
        <dd><input type="password" name="password"></dd>
        <dt>Password confirm</dt>
        <dd><input type="password" name="password_confirm"></dd>
        <dt><input type="submit" value="Sign up"></dt>
    </dl>
</form>