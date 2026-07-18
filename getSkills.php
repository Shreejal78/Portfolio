<?php
require 'conn.php';

$sql = "SELECT skills FROM admin_details";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['skills'];
}

$conn->close();
?>