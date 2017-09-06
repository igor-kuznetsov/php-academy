<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XHR AJAX Test</title>
</head>
<body>
    <a href="post.php" id="link">Send Request</a>
    <div id="container"></div>
    <script type="text/javascript" src="xhr.js"></script>
    <script type="text/javascript">
        sendXhrGet();
        document.getElementById("link").onclick = function () {
            sendXhrPost();
            return false;
        };
    </script>
</body>
</html>