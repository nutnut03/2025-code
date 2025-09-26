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
    $conn = new mysqli("localhost", "root", "", "mydatabase");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
        if ($stmt->execute()) {
            echo "<script>alert('You registered successfully!');location.href='login.php';</script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    ?>

    <form method="post">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Register">
    </form>


</body>

</html>