<?php if($register_form_errors = validation_errors()) {
    echo '<div class="errbox">'.$register_form_errors.'</div>';
} ?>
<form method="POST" class="form-custom" action="/user/register">
	<h2 class="form-custom-heading">Sign up</h2>
	<br>
	<label class="sr-only" for="inputEmail">Email address</label>
	<input type="email" autofocus="" required="" placeholder="Email address" name="email" class="form-control input-top" id="inputEmail">
	<label class="sr-only" for="inputPassword">Password</label>
	<input type="password" required="" placeholder="Password" class="form-control input-middle" name="password" id="inputPassword">
	<label class="sr-only" for="inputPassconf">Confirm Password</label>
	<input type="password" required="" placeholder="Confirm Password" class="form-control input-bottom" name="passconf" id="inputPassconf">
	<button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
	<br>
	Alredy registered? <a href="<?php echo site_url('user/login'); ?>">Login</a>
</form>
