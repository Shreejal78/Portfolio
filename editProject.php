<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $projectId = $_POST["e_id"];
    $title = $_POST["e_title"];
    $des = $_POST["e_des"];
    $git = $_POST['e_git_url'];
    $live = $_POST['e_live_url'];

    $result = $conn->query("SELECT img_path FROM projects WHERE id = '$projectId'");
    $row = $result->fetch_assoc();
    $imgPath = $row['img_path'];

    if (isset($_FILES["e_image"]) && $_FILES["e_image"]["error"] == 0) {

        $targetDir = "images/projectImages/";
        $extension = strtolower(pathinfo($_FILES["e_image"]["name"], PATHINFO_EXTENSION));

        $newFileName = uniqid() . "." . $extension;
        $targetFile = $targetDir . $newFileName;

        if (move_uploaded_file($_FILES["e_image"]["tmp_name"], $targetFile)) {
            if (!empty($imgPath) && file_exists($imgPath)) {
                unlink($imgPath);
            }

            $imgPath = $targetFile;
        }
    }

    $sql = "UPDATE projects
            SET title='$title',
                img_path='$imgPath',
                description='$des',
                github='$git',
                live='$live'
            WHERE id='$projectId'";

    if ($conn->query($sql) === TRUE) {
        header("Location: projectForm.php");
        exit;
    } else {
        echo $conn->error;
    }
}
?>