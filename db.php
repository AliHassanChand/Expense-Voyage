<?php
// Database credentials
$host = 'localhost';
$db   = 'tourism';
$user = 'root';
$pass = '';

try {
    // Create a new PDO instance
    $con = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Set the global variable $conn for use in other scripts
$conn = $con;
?>
