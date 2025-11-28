<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "ALTER TABLE DataStorage ADD location VARCHAR(255)";
if ($conn->query($sql) === TRUE) {
    echo "Column 'address' added successfully";
} else {
    echo "Error updating table: " . $conn->error;
}

$conn->close();
