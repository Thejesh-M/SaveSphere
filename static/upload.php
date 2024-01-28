<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['video']['name']);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a video file
    $allowedExtensions = ['mp4', 'avi', 'mov', 'mkv'];
    if (!in_array($videoFileType, $allowedExtensions)) {
        echo 'Sorry, only MP4, AVI, MOV, and MKV files are allowed.';
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo 'Sorry, the file already exists.';
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES['video']['size'] > 100000000) {
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Move the file to the target directory if everything is okay
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFile)) {
            echo 'The file ' . htmlspecialchars(basename($_FILES['video']['name'])) . ' has been uploaded.';
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
}
?>
