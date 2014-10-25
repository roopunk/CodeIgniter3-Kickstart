<br><p>Login.</p>
<br>
<?php if($login_form_errors = validation_errors()) {
    echo '<div class="errbox">'.$login_form_errors.'</div>';
} ?>
<form method="POST" action="<?php echo site_url('user/login'); ?>">
<h5>Email ID</h5>
<input type="text" name="email" size="20" value=""/>
<h5>Password</h5>
<input type="password" name="password" value="" size="20" />
<div><input type="submit" value="Login" /></div>
</form>
<br>
New user? Click <a href="<?php echo site_url('user/register'); ?>">here</a> to register.
