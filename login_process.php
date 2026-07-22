<?php
require 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: form.php");
            exit;

        } else {
                echo "<h2 style='color:#ed0000;font-family:arial;font-weight:600;font-size:32px;position:absolute;top:10%;left:50%;translate:-50% 0%;'>× INCORRECT USERNAME OR PASSWORD ×</h2>";

        }

    } else {
           echo "<h2 style='color:#ed0000;font-family:arial;font-weight:600;font-size:32px;position:absolute;top:10%;left:50%;translate:-50% 0%;'>× INCORRECT USERNAME OR PASSWORD ×</h2>";

    }

    $stmt->close();
}

$conn->close();
?>