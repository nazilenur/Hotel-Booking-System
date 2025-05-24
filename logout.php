<link rel="stylesheet" href="style/style.css">

<?php
session_start();
session_destroy();
header("Location: index.php");
?>