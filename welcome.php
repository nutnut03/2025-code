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
        const clock = document.getElementById("clock"),
            greeting = document.getElementById("greeting");

        function updateClock() {
            let n = new Date();
            clock.textContent = n.toDateString() + " • " + n.toLocaleTimeString();
        }

        function setGreeting() {
            let h = new Date().getHours();
            greeting.textContent = h < 12 ? "Good morning, enjoy your day!" :
                h < 18 ? "Good afternoon, keep up the good work!" :
                "Good evening, time to relax!";
        }
        setGreeting();
        updateClock();
        setInterval(updateClock, 1000);
    </script>

</body>

</html>