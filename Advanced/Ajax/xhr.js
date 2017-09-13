function sendXhrGet()
{
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;

        if (this.status == 200) {
            console.log(xhr.responseText);
        } else {
            console.log(xhr.status + ': ' + xhr.statusText);
        }
    };

    xhr.open('GET', 'data.json', true);
    xhr.send();
}

function sendXhrPost()
{
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState != 4) return;

        if (this.status == 200) {
            document.getElementById('container').innerHTML = xhr.responseText;
            console.log('OK');
        } else {
            console.log(xhr.status + ': ' + xhr.statusText);
        }
    };

    xhr.open('POST', 'post.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("text=XHR&h=30");

    return false;
}