<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    // Step 1: Connect to MySQL server (no database yet)
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br>";

    // Step 2: Create database if it doesn’t exist
    $sql = "CREATE DATABASE IF NOT EXISTS mydatabase";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }

    // Close initial connection
    $conn->close();

    // Step 3: Connect again, this time to the new database
    $conn = new mysqli("localhost", "root", "", "mydatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to mydatabase successfully<br>";

    // Step 4: Create table
    $sql = "CREATE TABLE IF NOT EXISTS DataStorage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    nickname VARCHAR(50),
    age INT CHECK (age >= 0),
    email VARCHAR(100) UNIQUE NOT NULL,
    contact_number VARCHAR(20)
)";
    if ($conn->query($sql) === TRUE) {
        echo "Table DataStorage created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // Close connection
    $conn->close();
    ?>
</body>

</html>