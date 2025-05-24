

<?php
include "config.php";
session_start();
$user = $_SESSION['username'];

$uid = $conn->query("SELECT id FROM users WHERE username='$user'")->fetch_assoc()['id'];

$result = $conn->query("SELECT * FROM reservations WHERE user_id=$uid");

echo "<h2>My Reservations</h2>";
while($row = $result->fetch_assoc()) {
    echo "Room Number: " . $row['room_number'] ."<br>".
     "Check-inn: " . $row['check_in'] ."<br> ". 
     "Check-out: " . $row['check_out']."<br>" ."<hr>";
    echo " <a href='delete.php?id=" . $row['id'] . "'> Delete |  </a>";
}
echo  "<a href='reserve.php'>Go Back</a> ";

?>

<html>
    <head>
        <link rel="stylesheet" href="style/reservestyle.css">
    </head>
    <body>
        <div class="time">
            <label id="time"></label>
        </div>
        <script>
            let time = document.getElementById("time");
            let d = new Date();
            time.innerHTML = d.toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
        </script>
    </body>
</html>
