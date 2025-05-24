

<?php
include "config.php";
session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit(); }

$user = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = $_POST['room'];
    $in = $_POST['check_in'];
    $out = $_POST['check_out'];

    $uid = $conn->query("SELECT id FROM users WHERE username='$user'")->fetch_assoc()['id'];

    $stmt = $conn->prepare("INSERT INTO reservations (user_id, room_number, check_in, check_out) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $uid, $room, $in, $out);
    $stmt->execute();
}
?>


<html>
    <body>
        <div class="form">
    <h2 style="color: white;">Make Reservations</h2>
    <form method="post">
    Room Number: <input type="number" name="room" class="name"><br>
    Check-inn: <input type="date" name="check_in" class="name"><br>
    Check-out: <input type="date" name="check_out" class="name"><br>
    <input type="submit" value="Rezervasyon Yap" class="sign-up-button">
    <a href="reservations.php" >See my reservations </a> | <a href="logout.php">Log out</a>
</form>
</div>

<div class="time">
    <img class="time-icon" src="images/clock-three-svgrepo-com.svg"> 
    <label></label>
</div>

<script>
    let time = document.getElementById("time");
    let d = new Date();
    time.innerHTML = d.toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
</script>

    </body>
</html>

