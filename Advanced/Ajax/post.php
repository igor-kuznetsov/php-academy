<div style="border:1px solid black; width:200px; height:20px; text-align:center; color:red;">
    <?php echo $_POST['text'] ?? 'undefined'; ?>
</div>
<?php

$h = $_POST['h'] ?? 0;
echo '<div style="background-color:green; width:202px; height:'.$h.'px;"></div>';
exit;