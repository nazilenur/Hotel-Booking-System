<link rel="stylesheet" href="style/style.css">

<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: reserve.php");
    } else {
        echo "<script>alert('Invalid Login!');</script>";
    }
}

?>

<html>
    <body>
        <form method="post" class="form">
            <h1 style="color:white">Welcome to Cherry Moon Inn!</h1>
    <div class="user-name">
        <img class="icon" src="images/user-svgrepo-com (1).svg "alt="user icon">
        <label>Username</label>
        <input type="text" name="username" class="name" required><span>USERNAME</span>
    </div>
        <div class="user-password">
            <img class="icon" src="images/password-svgrepo-com.svg" alt="password icon">
            <label> Password </label>
            <input type="password" name="password" class="password" required><span>PASSWORD</span>
         </div>    
        <input type="submit"name="Sign in" value="Sign in" class="sign-up-button">
        <input type="submit" name="Register" value="Register" class="sign-up-button" onclick="window.location.href='register.php'">
</form>

<div class="time">
    <img class="time-icon" src="images/clock-three-svgrepo-com.svg"> 
    <label id="time"></label>
</div>  

<script>
    let time = document.getElementById("time");
    let d = new Date();
    time.innerHTML = d.toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
</script>

    </body>
</html>



