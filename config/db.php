<?php
// $host = "localhost";
// $db = "tourist_db";
// $user = "root";
// $pass = "";

try {
    // подключаемся к серверу
    $conn = new PDO("mysql:host=localhost;dbname=tourist_db", "root", "");
   # echo "Database connection established";
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>