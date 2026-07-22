<?php
require 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $title = $_POST['title'];
        $des = $_POST['des'];
        $git = $_POST['git_url'];
        $live = $_POST['live_url'];

        // Image upload
        $targetDir = "images/projectImages/";
        $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        $newFileName = uniqid() . "." . $extension;
        $targetFile = $targetDir . $newFileName;

        // Move uploaded file
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

        // This is what gets stored in the DB
        $img = $targetFile;

        $sql = "INSERT INTO projects (`title`, `img_path`, `description`, `github`, `live`) VALUES ('$title', '$img', '$des', '$git', '$live')";
        if ($conn->query($sql) == TRUE) {
            echo 'insert Done';
            header('Location: projectForm.php');
        }else{
            echo 'error';
        }
    }else{
        echo 'error hrererere firsttttt';
    }
}
?>