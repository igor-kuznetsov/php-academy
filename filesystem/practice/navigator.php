<?php

define('CURRENT_DIR', empty($_GET['dir']) ? __DIR__ : $_GET['dir']);

/**
 * @param string $relative_path
 * @return string
 */
function full_path(string $relative_path):string
{
    return CURRENT_DIR . DIRECTORY_SEPARATOR . $relative_path;
}

function process_post()
{
    $action = empty($_POST['action']) ? '' : $_POST['action'];

    switch ($action) {
        case 'rename':
            do_rename();
            break;
        case 'edit':
            do_edit();
            break;
        case 'delete':
            do_delete();
            break;
        default:
            break;
    }
}

function do_rename()
{
    $old_name = empty($_POST['old_name']) ? '' : $_POST['old_name'];
    $new_name = empty($_POST['new_name']) ? '' : $_POST['new_name'];
    if (empty($new_name)) {
        show_error('New name is required to rename a file');
    } else {
        $new_name = dirname($old_name) . DIRECTORY_SEPARATOR . $new_name;
        rename($old_name, $new_name);
    }
}

function do_edit()
{
    $path = empty($_POST['path']) ? '' : $_POST['path'];
    $content = empty($_POST['content']) ? '' : $_POST['content'];
    file_put_contents($path, $content);
}

function do_delete()
{
    //
}

function show_navigator()
{
    $dirs = [];
    $files = [];

    if (!is_dir(CURRENT_DIR)) {
        die('Error. Wrong directory');
    }

    if ($handle = opendir(CURRENT_DIR)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir(full_path($entry))) {
                    $dirs[] = $entry;
                } else {
                    $files[] = $entry;
                }
            }
        }

        closedir($handle);
    }
    ?>
    <table border="1" cellpadding="5" cellspacing="1" width="100%">
        <thead>
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Size</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>directory</td>
            <td>
                <a href="navigator.php?dir=<?php echo urlencode(realpath(full_path('..'))); ?>">..</a>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <?php foreach ($dirs as $dir_name) : ?>
            <tr>
                <td>directory</td>
                <td>
                    <a href="navigator.php?dir=<?php echo urlencode(full_path($dir_name)); ?>">
                        <?php echo $dir_name; ?>
                    </a>
                </td>
                <td></td>
                <td></td>
                <td>
                    <a href="navigator.php?action=rename&path=<?php echo urlencode(full_path($dir_name)); ?>">rename</a>
                    <a href="navigator.php?action=delete&path=<?php echo urlencode(full_path($dir_name)); ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php foreach ($files as $file_name) : ?>
            <tr>
                <td><?php echo mime_content_type(full_path($file_name)); ?></td>
                <td><?php echo $file_name; ?></td>
                <td><?php echo filesize(full_path($file_name)); ?> B</td>
                <td><?php echo date("d/m/Y H:i:s", filemtime(full_path($file_name))); ?></td>
                <td>
                    <a href="navigator.php?action=rename&path=<?php echo urlencode(full_path($file_name)); ?>">rename</a>
                    <a href="navigator.php?action=edit&path=<?php echo urlencode(full_path($file_name)); ?>">edit</a>
                    <a href="navigator.php?action=delete&path=<?php echo urlencode(full_path($file_name)); ?>">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}

function show_rename()
{
    if (empty($_GET['path'])) {
        show_error('please specify file path to rename');
        show_navigator();
    } else {
        ?>
        <form action="navigator.php" method="post">
            <input name="action" type="hidden" value="rename">
            <input name="old_name" type="hidden" value="<?php echo $_GET['path']; ?>">
            <input name="new_name" placeholder="New name">
            <input type="submit">
        </form>
        <?php
    }
}

function show_edit()
{
    if (empty($_GET['path'])) {
        show_error('please specify file path to edit');
        show_navigator();
    } else {
        $path = urldecode($_GET['path']);
        ?>
        <form action="navigator.php" method="post">
            <input name="action" type="hidden" value="edit">
            <input name="path" type="hidden" value="<?php echo $path; ?>">
            <textarea name="content"><?php echo file_get_contents($path); ?></textarea>
            <input type="submit">
        </form>
        <?php
    }
}

function show_delete()
{
    //
}

function show_error($text)
{
    echo '<div style="color:red">Error: ' . $text . '</div>';
}

$action = empty($_GET['action']) ? '' : $_GET['action'];

switch ($action) {
    case 'rename':
        show_rename();
        break;
    case 'edit':
        show_edit();
        break;
    case 'delete':
        show_delete();
        break;
    default:
        process_post();
        show_navigator();
        break;
}