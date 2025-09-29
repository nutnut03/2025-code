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


    <form method="post">
        <h2>Login</h2>
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <input type="submit" value="Login">
    </form>


</body>

</html>