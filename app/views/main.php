
<?php
if ($currentUser!==NULL):?>
    <div>Вы авторизованы</div>
    <div class="main_user">Main user:<?=$currentUser?></div>
    <a href="/logout" class="logout">Logout</a>

<?php endif;?>
<? if($currentUser===NULL):?>
    <div class="main_user">Main user:No active users</div>
    <a href="/login">Login</a>
    <a href="/signup">SignUp</a>
<?php endif;?>





