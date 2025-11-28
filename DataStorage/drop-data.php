<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "ALTER TABLE DataStorage DROP COLUMN location";
if ($conn->query($sql) === TRUE) {
    echo "Column is deleted successfully";
} else {
    echo "Error deleting column: " . $conn->error;
}

$conn->close();
