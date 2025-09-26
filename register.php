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
    $conn = new mysqli("localhost", "root", "", "mydatabase") or die("DB Fail");
    if ($_POST) {
        $stmt = $conn->prepare("INSERT INTO users(username,password)VALUES(?,?)");
        $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
        echo $stmt->execute()
            ? "<script>alert('Registered successfully!');location='login.php';</script>"
            : "Error: " . $stmt->error;
    }
    ?>

    <form method="post">
        <h2>Register</h2>
        <label>Username: <input type="text" name="username" required></label><br><br>
        <label>Password: <input type="password" name="password" required></label><br><br>
        <input type="submit" value="Login">
    </form>


</body>

</html>