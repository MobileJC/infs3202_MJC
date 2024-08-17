<div class="container">
      <div class="col-4 offset-4">
	  <br><h2 class="text-center">Welcome to DisCUTS!</h2><br>
			<?php echo form_open(base_url().'create_post/insert_post'); ?>
				<h4 class="text-center">Create Post</h4>
					<p>Post Title: </p>  
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Post title" required="required" name="postTitle">
					</div>
					<p>Course category: </p>  
					<div class="form-group">
						<select id="course" name="postCourse" required="required">
							<option selected disabled hidden>Please choose your course</option>
							<option value="INFS3200">INFS3202</option>
							<option value="INFS7200">INFS7202</option>
						</select>
					</div>
					<p>Content: </p>
					<div class="form-group">
						<textarea id="content" name="postContent" rows="4" cols="50">Post content</textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>   
			<?php echo form_close(); ?>
	</div>
</div>
