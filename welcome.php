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
        <h1>Welcome, <?php echo $_SESSION['username']; ?> 🎉</h1>
        <p id="greeting">Have a great day!</p>
        <p id="clock"></p>
        <a class="btn" href="logout.php">Logout</a>
    </div>

    <script>
        // Show live clock
        function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString();
            const date = now.toDateString();
            document.getElementById("clock").textContent = date + " • " + time;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Dynamic greeting based on time of day
        function setGreeting() {
            const hour = new Date().getHours();
            let greeting;
            if (hour < 12) {
                greeting = "Good morning, enjoy your day!";
            } else if (hour < 18) {
                greeting = "Good afternoon, keep up the good work!";
            } else {
                greeting = "Good evening, time to relax!";
            }
            document.getElementById("greeting").textContent = greeting;
        }
        setGreeting();
    </script>

</body>

</html>