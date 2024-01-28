function uploadVideo() {
    var formData = new FormData(document.getElementById('uploadForm'));

    var xhr = new XMLHttpRequest();
    
    xhr.upload.addEventListener("progress", function(event) {
        if (event.lengthComputable) {
            var percentComplete = (event.loaded / event.total) * 100;
            document.getElementById('progress').innerHTML = "Uploading: " + percentComplete.toFixed(2) + "%";
        }
    }, false);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server
            console.log(xhr.responseText);
        }
    };

    xhr.open("POST", "upload.php", true);
    xhr.send(formData);
}
