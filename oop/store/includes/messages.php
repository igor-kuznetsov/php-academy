<?php if (Message::exists()): ?>
    <div>
        <?php $messages = Message::get(); ?>
        <?php if (isset($messages[Message::TYPE_ERROR])) : ?>
            <ul style="border:1px solid red; color:red; font-style:italic;">
                <?php foreach ($messages[Message::TYPE_ERROR] as $message) : ?>
                    <li><?php echo $message; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
        <?php if (isset($messages[Message::TYPE_GENERAL])) : ?>
            <ul style="border:1px solid green; color:green; font-style:italic;">
                <?php foreach ($messages[Message::TYPE_GENERAL] as $message) : ?>
                    <li><?php echo $message; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>
<?php endif; ?>