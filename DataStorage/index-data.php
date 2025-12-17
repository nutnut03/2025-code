<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles-data.css">
</head>

<body>
    <h2>Add User Information</h2>
    <form method="POST">
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        <label>Nickname:</label>
        <input type="text" name="nickname">
        <label>Age:</label>
        <input type="number" name="age" min="0">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Contact Number:</label>
        <input type="text" name="contact_number">
        <input type="submit" name="submit" value="Save">
    </form>

    <?php
    if (!empty($_POST['submit'])) {
        $conn = new mysqli("localhost", "root", "", "mydatabase");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $sql = "INSERT INTO DataStorage (firstname, lastname, nickname, age, email, contact_number)
            VALUES ('{$conn->real_escape_string($_POST['firstname'])}',
                    '{$conn->real_escape_string($_POST['lastname'])}',
                    '{$conn->real_escape_string($_POST['nickname'])}',
                    " . (int)$_POST['age'] . ",
                    '{$conn->real_escape_string($_POST['email'])}',
                    '{$conn->real_escape_string($_POST['contact_number'])}')";

        echo $conn->query($sql) ? "<p style='color:green;'>Record added!</p>" : "<p style='color:red;'>Error: {$conn->error}</p>";
        $conn->close();
    }
    ?>
</body>

</html>