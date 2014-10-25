<br><p>New User? Sign up<p>
<br>
<?php if($register_form_errors = validation_errors()) {
    echo '<div class="errbox">'.$register_form_errors.'</div>';
} ?>
<form method="POST" action="<?php echo site_url('user/register'); ?>">
<h5>Email ID</h5>
<input type="text" name="email" size="20" value=""/>
<h5>Password</h5>
<input type="password" name="password" value="" size="20" />
<h5>Password Confirm</h5>
<input type="password" name="passconf" value="" size="20" />
<div><input type="submit" value="Register" /></div>
</form>
<br>
Alredy registered? Click <a href="<?php echo site_url('user/login'); ?>">here</a> to login.
