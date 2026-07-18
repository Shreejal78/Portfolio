<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $sql = "DELETE FROM projects WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo 'success'; //redirect url

    } else {
        echo "" . $conn->error;
    }
}
?>