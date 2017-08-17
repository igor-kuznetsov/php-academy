<h3>Pages</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Alias</th>
            <th>Title</th>
            <th>Content</th>
            <th>Published</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($data['pages'] as $page) : ?>
    <tr>
        <td><?php echo $page['alias']; ?></td>
        <td><?php echo $page['title']; ?></td>
        <td><?php echo $page['content']; ?></td>
        <td><?php echo $page['is_published'] ? 'Yes' : 'No'; ?></td>
        <td>
            <a href="/admin/pages/edit/<?php echo $page['id']; ?>">
                <button class="btn btn-sm btn-primary">edit</button>
            </a>
            <a href="/admin/pages/delete/<?php echo $page['id']; ?>" onclick="return confirmDelete();">
                <button class="btn btn-sm btn-warning">delete</button>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="/admin/pages/add">
    <button class="btn btn-sm btn-success">New Page</button>
</a>
