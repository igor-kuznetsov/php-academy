<?php

$iterator = new DirectoryIterator('../');
//$fs = new FilesystemIterator('');
//$e = new EmptyIterator();

?>
<table border="1" cellspacing="0" cellpadding="5" width="640px">
    <thead>
        <tr>
            <th>Name</th>
            <th width="5%">Type</th>
            <th width="10%">Size</th>
            <th width="10%">Permissions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($iterator->valid()): ?>
        <tr>
            <?php if (!$iterator->isDot()): ?>
                <td><?php echo $iterator->getFilename(); ?></td>
                <td><?php echo $iterator->isDir() ? 'dir' : 'file'; ?></td>
                <td><?php echo $iterator->getSize(); ?> B</td>
                <td>
                    <?php echo $iterator->isReadable() ? 'r' : '-'; ?>
                    <?php echo $iterator->isWritable() ? 'w' : '-'; ?>
                    <?php echo $iterator->isExecutable() ? 'x' : '-'; ?>
                </td>
            <?php endif?>
        </tr>
        <?php $iterator->next(); ?>
    <?php endwhile; ?>
    </tbody>
</table>
