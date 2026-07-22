<?php
$hostname = 'sql311.infinityfree.com';
$username = 'if0_42471024';
$password = '7Vr5fJixyC8C';
$db_name = 'if0_42471024_portfolio';

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // Local XAMPP
    $conn = mysqli_connect("localhost", "root", "", "portfolio");
}else{
    $conn = mysqli_connect($hostname, $username, $password, $db_name);

}
if (!$conn) {
    die("Connection failed");
}

?>