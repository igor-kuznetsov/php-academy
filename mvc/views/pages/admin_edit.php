<h3>Page Edit</h3>
<br>
<form action="" method="post" style="width:400px">
    <input type="hidden" name="id" value="<?php echo $data['page']['id']; ?>">
    <input name="alias" placeholder="Alias" class="form-control" value="<?php echo $data['page']['alias']; ?>"><br>
    <input name="title" placeholder="Title" class="form-control" value="<?php echo $data['page']['title']; ?>"><br>
    <textarea name="content" placeholder="Content" class="form-control"><?php echo $data['page']['content']; ?></textarea><br>
    <label for="is_published">Published</label>
    <input name="is_published" type="checkbox" id="is_published" <?php echo !empty($data['page']['is_published']) ? 'checked="checked"' : ''; ?> value="yyy"><br>
    <input type="submit" class="btn btn-sm btn-success" value="Save">
</form>