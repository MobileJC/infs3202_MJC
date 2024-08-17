<script>
  window.addEventListener('load', function() {
    const base_url = '<?= base_url() ?>';
    const imageSelector = document.getElementById('image-selector');
    const selectedImageContainer = document.getElementById('selected-image-container');

    imageSelector.addEventListener('change', function() {
      const selectedImage = this.value;
      if (selectedImage !== '') {
        const xhttp = new XMLHttpRequest();
        const promise = new Promise(function(resolve, reject) {
          xhttp.onload = function() {
            selectedImageContainer.innerHTML = `<img class="rounded" src="${base_url}writable/uploads/${selectedImage}" alt="${selectedImage}">`;
            resolve();
          };
        });
        xhttp.open('GET', `get_image.php?filename=${selectedImage}`);
        xhttp.send();
        return promise;
      } else {
        selectedImageContainer.innerHTML = '';
      }
    });
  });
</script>


<div class="container">
    <div class="col-4 offset-4">
        <h2 class="text-center">My Uploaded Images</h2>
        <?php if (!empty($files)) : ?>
            
            <select id="image-selector">
                <option value="">Select an image</option>
                <?php foreach ($files as $file) : ?>
                    <option value="<?= $file ?>"><?= $file ?></option>
                <?php endforeach; ?>

                
            </select>
            <div id="selected-image-container"></div>
        <?php else: ?>
            <p>No images were uploaded.</p>
        <?php endif; ?>
    </div>
</div>