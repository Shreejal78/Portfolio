<?php
require 'conn.php';

$sql = "SELECT skills FROM user";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['skills'];
}

$conn->close();
?>