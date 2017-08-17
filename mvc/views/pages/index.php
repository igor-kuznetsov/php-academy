<?php foreach ($data['pages'] as $page) : ?>
    <div style="padding:20px; width:300px; border:1px solid black">
        <a href="/pages/view/<?php echo $page['alias']; ?>">
            <?php echo $page['title']; ?>
        </a>
    </div>
<?php endforeach; ?>
