<h3>Messages</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($data['messages'] as $message) : ?>
    <tr>
        <td><?php echo $message['name']; ?></td>
        <td><?php echo $message['email']; ?></td>
        <td><?php echo $message['message']; ?></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>