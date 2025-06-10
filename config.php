<!-- WET Assignment 
Name: Ahmed Mustafa
Roll No: 2K22/CSM/9
Teacher: Sir Gulsher Laghari -->
<?php
$host = 'localhost';
$dbname = 'shopping_WET';
$username = 'root';
$password = ''; // Change if your MySQL has a password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>