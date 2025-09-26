<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    ?>
    <div class="welcome-box">
        <h1>Welcome, <?= $_SESSION['username']; ?> 🎉</h1>
        <p id="greeting"></p>
        <p id="clock"></p>
        <a class="btn" href="logout.php">Logout</a>
    </div>
    <script>
        const c = document.getElementById("clock"),
            g = document.getElementById("greeting");
        const up = () => c.textContent = new Date().toDateString() + " • " + new Date().toLocaleTimeString();
        g.textContent = (h => h < 12 ? "Good morning!" : h < 18 ? "Good afternoon!" : "Good evening!")(new Date().getHours());
        up();
        setInterval(up, 1000);
    </script>

</body>

</html>