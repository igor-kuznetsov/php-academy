<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JQuery AJAX Test</title>
</head>
<body>
<a href="post.php" id="link">Send Request</a><br>
<a href="db.php" id="db">Get Pages</a><br>
<div id="container"></div>

<script src="jquery.min.js"></script>
<script type="text/javascript">
    (function($) {

        $.ajax({
            url: 'data.json',
            type: 'get',
            dataType: 'json', //optional
            success: function (data, status, xhr) {
                //console.log(xhr.responseText);
                console.log(data);
            },
            error: function (xhr, status) {
                //console.log(xhr.status + ': ' + xhr.statusText);
                console.log('Error: ' + status);
            }
        });

        $('#link').on('click', function (event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('href'),
                type: 'post',
                data: {
                    text: 'JQuery',
                    h: 15
                },
                dataType: 'html',
                success: function (data) {
                    $('#container').html(data);
                    console.log('OK');
                },
                error: function (xhr, status) {
                    console.log('Error: ' + status);
                }
            });
        });

        $('#db').on('click', function (e) {
            e.preventDefault();

            $.get({
                url: $(this).attr('href'),
                dataType: 'json',
                success: function (res) {
                    if (res.error == '') {
                        console.log(res.data);
                    } else {
                        console.log('PHP Exception: ' + res.error);
                    }
                },
                error: function (xhr, status) {
                    console.log('Error: ' + status);
                }
            });
        });

    })(jQuery);
</script>
</body>
</html>