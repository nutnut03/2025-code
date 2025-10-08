<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
echo "Connected successfully<br>";

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";
echo $conn->query($sql) ? "Table users created successfully" : "Error: " . $conn->error;

$conn->close();
?>

<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="logo"><a href="//www.facebook.com/search/top?q=merise%20english%20academy%20cebu"><img src="images/MeRISE-png.png"></a></div>
        <div class=" menu-toggle" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
        <div class="nav-links" id="navLinks">
            <a href="home.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="welcome.php">Welcome</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>


</body>


</html>