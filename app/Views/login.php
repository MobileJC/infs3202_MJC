<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'login/check_login'); ?>
				<br><h2 class="text-center">Welcome to DisCUTS!</h2><br>
				<h4 class="text-center">Login</h4>       
					<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" required="required" name="username" <?php if (isset($_COOKIE['user'])) { echo 'value="' . $_COOKIE['user'] . '"'; } ?>>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div class="form-group">
						<?php echo $error; ?>
					</div>
					<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Ld3kswlAAAAAJWX6GQtqx9oSZmkY6xX5_JbOdJ2"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="clearfix">
						<label class="float-left form-check-label"><input type="checkbox" name="remember_me"> Remember me</label>
						<a href="<?php echo base_url().'forgot_password_verify'; ?>" class="float-right">Forgot Password?</a>
						<a href="<?php echo base_url().'create_account'; ?>" class="float-right">Create account</a>
					</div>    
			<?php echo form_close(); ?>
	</div>
</div>
