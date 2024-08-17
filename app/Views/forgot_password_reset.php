<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'forgot_password_reset/updatePassword'); ?>
				<h2 class="text-center">Forgot Password</h2> 
					<input type="hidden" name="username" value="<?php echo $usernameInPrvForm; ?>">
                    <div class="form-group">
                        <p>New password: </p>
						<input type="password" class="form-control" placeholder="New Password" required="required" name="newPasswordReset">
					</div>
					<p>(You will be redirected back to the login page if you have successfully reset your password.)</p>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>   
			<?php echo form_close(); ?>
	</div>
</div>
