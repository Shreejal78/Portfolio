<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<h2 style='color:#ed0000;font-family:arial;font-weight:800;font-size:48px;'>× ACCESS DENIED ×</h2>";
    exit;
}

?>