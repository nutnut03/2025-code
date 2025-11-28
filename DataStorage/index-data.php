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
    <form method="POST" action="">
        <label for="firstname">First Name:</label><br>
        <input type="text" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" name="lastname" required><br><br>

        <label for="nickname">Nickname:</label><br>
        <input type="text" name="nickname"><br><br>

        <label for="age">Age:</label><br>
        <input type="number" name="age" min="0"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="contact_number">Contact Number:</label><br>
        <input type="text" name="contact_number"><br><br>

        <input type="submit" name="submit" value="Save">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Connect to database
        $conn = new mysqli("localhost", "root", "", "mydatabase");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare data
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $nickname = $conn->real_escape_string($_POST['nickname']);
        $age = (int)$_POST['age'];
        $email = $conn->real_escape_string($_POST['email']);
        $contact_number = $conn->real_escape_string($_POST['contact_number']);

        // Insert into table
        $sql = "INSERT INTO DataStorage (firstname, lastname, nickname, age, email, contact_number)
            VALUES ('$firstname', '$lastname', '$nickname', $age, '$email', '$contact_number')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>New record created successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>

</html>