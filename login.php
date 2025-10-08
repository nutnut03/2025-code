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
$conn = new mysqli("localhost", "root", "", "mydatabase") or die("DB Fail");

if ($_POST) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    if ($row && $_POST['password'] === $row['password']) {
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
        exit;
    } else echo "<script>alert('Invalid username or password!');</script>";
}
?>

<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="logo"><a href="https://www.facebook.com/MeRISEEnglishAcademyCebu"><img src="images/MeRISE-png.png"></a></div>
        <div class=" menu-toggle" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
        <div class="nav-links" id="navLinks">
            <a href="home.php">Home</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="welcome.php">Welcome</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <form method="post">
        <h2>Login</h2>
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <input type="submit" value="Login">
    </form>



    <footer>
        <p>
            MeRISE English Academy 2025 ESY Building, Corner Juana Osmena St. Brgy.
            Kamputhaw, Cebu City Office Tel.No. - PLDT: (032) 345 8524 | Office
            Tel.No. - Globe: (032) 479 0414 Email us: academic_support@meriseinc.com
        </p>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
    </script>

</body>

</html>