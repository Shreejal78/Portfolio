<?php
require 'conn.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usrname = $_POST['name'];
    $skills = $_POST['skills'];
    $des = $_POST['des'];
    $sql = "INSERT INTO user (`username`, `skills`, `description`) VALUES ('$usrname','$skills','$des')";
    if($conn->query($sql) == TRUE){
        echo 'insert Done';
    }
}
?>