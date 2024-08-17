<!DOCTYPE html>
<html>
<head>
    <title>DisCUTS User Profile</title>
</head>
<body>
    <div class="container">
        <div class="col-4 offset-4">
       
      
      <?php echo form_open(base_url().'user_profile/update_user'); ?>    
      <div class="form-group">
	  <?php echo $error; ?>
	  </div>  
      <br><h2 class="text-center">User Profile</h2>
        <br><h5 class="text-center">You can change your password and email here.</h5>
                    <div class="form-group">
                        <p>Username: <?php echo $data['username']; ?></p>
					</div>
                    <div class="form-group">
                        <p>Previous Password: </p>
                        <p>(Enter to proceed change of password)</p>
						<input type="password" class="form-control" placeholder="Previous Password" required="required" name="oldPassword">
					</div>
					<div class="form-group">
                        <p>New Password: </p>
                        <p>(Enter to proceed change of password)</p>
						<input type="password" class="form-control" placeholder="New Password" required="required" name="newPassword">
					</div>
                    <div class="form-group">
                        <p>Email: <?php echo $data['email']; ?></p>
                        <input type="email" class="form-control" placeholder="Email" required="required" name="email">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Save</button>
					</div>    
			<?php echo form_close(); ?>
	</div>
</div>
   
 
</body>
</html>