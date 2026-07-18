<?php
require 'conn.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $img = $_POST['image'];
    $des = $_POST['des'];
    $git = $_POST['git_url'];
    $live = $_POST['live_url'];
    $sql = "INSERT INTO  projects (`title`, `img_path`, `description`,`github`,`live`) VALUES ('$title','$img','$des','$git','$live')";
    if($conn->query($sql) == TRUE){
        echo 'insert Done';
        header('Location: projectForm.php');
    }
}
?>