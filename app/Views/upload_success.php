<div class="container">
    <div class="col-4 offset-4">
        <h2 class="text-center">File(s) Uploaded Successfully!</h2>
        <?php if (!empty($uploaded_files)): ?>
		<ul>
			<?php foreach ($uploaded_files as $file): ?>
				<li><?php echo $file; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
    </div>
</div>