<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST["e_id"];
    $title = $_POST["e_title"];
    $imgPath = $_POST["e_image"];
    $des = $_POST["e_des"];
    $git = $_POST['e_git_url'];
    $live = $_POST['e_live_url'];
    $sql = "UPDATE projects SET title='$title', img_path='$imgPath', description='$des', github='$git', live='$live' WHERE id = '$projectId'";
    if ($conn->query($sql) === TRUE) {
        echo 'success';
        header('Location: projectForm.php');

    } else {
        echo "" . $conn->error;
    }
}
?>