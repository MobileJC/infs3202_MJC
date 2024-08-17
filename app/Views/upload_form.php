<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>
    <style>
        .rounded {
            border-radius: 50%;
        }
    </style>
</head>
<body>

<?= form_open_multipart(base_url() . 'upload/upload_file') ?>
    <label for="userID">User ID: <?php echo $sessionUsername; ?></label>
    <input type="hidden" name="username" value="<?php echo $sessionUsername; ?>">
    
    <br><br>
    <label for="title">Item Name</label>
    <input type="text" name="title" size="20" required>
    <br><br>
    <input type="file" name="userfile[]" multiple>
    <br><br>
    <input type="submit" value="upload">
</form>

</body>
</html>

