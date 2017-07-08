<?php if (is_messages()): ?>
    <div>
        <?php $messages = get_messages(); ?>
        <?php if (isset($messages['error'])) : ?>
            <ul style="border:1px solid red; color:red; font-style:italic;">
                <?php foreach ($messages['error'] as $message) : ?>
                    <li><?php echo $message; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
        <?php if (isset($messages['general'])) : ?>
            <ul style="border:1px solid green; color:green; font-style:italic;">
                <?php foreach ($messages['general'] as $message) : ?>
                    <li><?php echo $message; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>
<?php endif; ?>