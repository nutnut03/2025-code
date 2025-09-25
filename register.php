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
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "mydatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }

        $stmt->bind_param("ss", $user, $pass);

        if ($stmt->execute()) {
            // ✅ Show alert then redirect to login.php
            echo "<script>
                alert('You registered successfully!');
                window.location.href = 'login.php';
              </script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    ?>

    <form method="post" action="">
        <h2>Register</h2>
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>


</body>

</html>