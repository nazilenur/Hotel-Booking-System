<link rel="stylesheet" href="style/style.css">

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "otel";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>