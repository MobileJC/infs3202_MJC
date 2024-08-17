<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'forgot_password_verify/check_user_exist'); ?>
				<h2 class="text-center">Forgot Password</h2>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<p>What is your username?</p>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" required="required" name="username">
					</div>
					<p>What is the name of your University?</p>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Security question 1" name="sq1">
					</div>
					<p>Where is the main campus?</p>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Security question 2" name="sq2">
					</div>
					<p>What is the name of this course?</p>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Security question 3" name="sq3">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>   
			<?php echo form_close(); ?>
	</div>
</div>
