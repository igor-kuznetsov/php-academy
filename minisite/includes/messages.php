<?php if (is_messages()): ?>
    <div style="border:1px solid green; color:green; font-style:italic;">
        <ul>
            <?php foreach (get_messages() as $message) : ?>
                <li><?php echo $message; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>