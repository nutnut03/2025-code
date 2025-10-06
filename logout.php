<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>

<body>
    <!-- Navigation -->
    <div class="nav">
        <a href="home.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="welcome.php">Welcome</a>
        <a href="logout.php">Logout</a>
    </div>

</body>

</html>