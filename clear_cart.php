<!-- WET Assignment 
Name: Ahmed Mustafa
Roll No: 2K22/CSM/9
Teacher: Sir Gulsher Laghari -->
<?php
session_start();
$_SESSION['cart'] = [];
header('Content-Type: application/json');
echo json_encode(['cart' => [], 'total' => 0]);
exit();
?>