<link rel="stylesheet" href="style/style.css">

<?php
include "config.php";
session_start();
$id = $_GET['id'];
$conn->query("DELETE FROM reservations WHERE id=$id");
header("Location: reservations.php");