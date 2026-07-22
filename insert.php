<?php
require 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usrname = $_POST['name'];
    $skills = $_POST['skills'];
    $des = $_POST['des'];
    $admin_id;

    $sqlCheckDB = "SELECT * FROM admin_details";
    $result = mysqli_query($conn, $sqlCheckDB);
    if (mysqli_num_rows($result) == 0) {


        $sqlInsert = "INSERT INTO admin_details (`username`, `skills`, `description`) VALUES ('$usrname','$skills','$des')";
        if ($conn->query($sqlInsert) == TRUE) {
            header('Location: form.php');
        }
    } else {
        echo 'updateee';
        while ($row = mysqli_fetch_assoc($result)) {
            $admin_id = $row['id'];
        }
        $sqlUpdate = "UPDATE `admin_details` SET `username`='$usrname',`skills`='$skills',`description`='$des' WHERE id = '$admin_id'";
        if ($conn->query($sqlUpdate) == TRUE) {
            header('Location: form.php');
        }

    }
}

?>