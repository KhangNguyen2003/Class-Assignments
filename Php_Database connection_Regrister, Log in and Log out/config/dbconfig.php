<?php

$host='localhost';
$dbname = 'accounts';
$user='root'; 
$password = 'root123';

$dsn = "mysql:host=$host;dbname=$dbname; port=3307";

try {
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Database Connection failed: " . $e->getMessage();
    throw new PDOException($e->getMessage());
}

?>