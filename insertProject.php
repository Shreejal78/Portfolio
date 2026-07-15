<?php
require 'conn.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $img = $_POST['image'];
    $des = $_POST['des'];
    $sql = "INSERT INTO  projects (`title`, `img_path`, `description`) VALUES ('$title','$img','$des')";
    if($conn->query($sql) == TRUE){
        echo 'insert Done';
    }
}
?>