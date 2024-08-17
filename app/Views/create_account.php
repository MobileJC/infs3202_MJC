<div class="container">
    <div class="col-4 offset-4">
        <?php validation_list_errors() ?>
        <?php echo form_open(base_url().'create_account/create_account'); ?>
        <br>
        <h2 class="text-center">Welcome to DisCUTS!</h2><br>
        <div class="form-group">
            <?php echo $error; ?>
        </div>
        <h4 class="text-center">Create account</h4>
        <h6 class="text-center">Personal information</h6>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required="required" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password confirmation" required="required" name="passconf">
        </div>
        <h6 class="text-center">Security questions</h6>
        <p>What is the name of your University?</p>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Security question 1" required="required" name="sq1">
        </div>
        <p>Where is the main campus?</p>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Security question 2" required="required" name="sq2">
        </div>
        <p>What is the name of this course?</p>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Security question 3" required="required" name="sq3">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
