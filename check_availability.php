<link rel="stylesheet" href="style/style.css">

<?php
include "config.php";

$room = $_POST['room'];
$in = $_POST['check_in'];
$out = $_POST['check_out'];

$query = $conn->query("SELECT * FROM reservations WHERE room_number=$room AND (check_in <= '$out' AND check_out >= '$in')");

echo ($query->num_rows > 0) ? "Dolu" : "Uygun";