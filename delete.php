<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = (int)$_GET["id"];

    // Get image path
    $result = $conn->query("SELECT img_path FROM projects WHERE id = $id");

    if ($result && $result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $imgPath = $row["img_path"];

        // Delete image file if it exists
        if (!empty($imgPath) && file_exists($imgPath)) {
            unlink($imgPath);
        }

        // Delete project from database
        $sql = "DELETE FROM projects WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo $conn->error;
        }

    } else {
        echo "Project not found.";
    }
}
?>