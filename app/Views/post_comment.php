<div class="table-container">
    <div class="container">
        <div class="col-4 offset-4">
            <table width="600" border="0" cellspacing="5" cellpadding="5">
                <tr>
                    <th>Username</th>
                    <th>Post Title</th>
                    <th>Comment</th>
                    <th>Timestamp</th>
                </tr>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?= $comment['commentUsername'] ?></td>
                        <td><?= $comment['postTitle'] ?></td>
                        <td><?= $comment['commentContent'] ?></td>
                        <td><?= $comment['commentDateTime'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php echo form_open(base_url().'post_comment/insert_comment'); ?>
        <br>
        <h2 class="text-center">Select a post to comment on:</h2><br>
        <div class="form-group">
            <select name="postID" id="post_title">
                <?php foreach ($posts as $post) : ?>
                    <option value="<?= $post['post_id'] ?>"><?= $post['postTitle'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <label for="comment_content">Comment:</label>
        <div class="form-group">
            <textarea name="commentContent" id="comment_content" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Submit Comment</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>