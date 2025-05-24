<link rel="stylesheet" href="style/style.css">

<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Sign up successful. <a href='index.php'>Sign in</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

echo  "<a href='index.php'>Go Back</a> ";
?>
<html>
    <body>
        <form method="post" class="form">
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
        <input type="submit" value="Sign up" class="sign-up-button" required>
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
