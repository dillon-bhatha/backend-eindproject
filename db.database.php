<?php
$dbhost = "localhost";
$dbname = "pdo";
$dbuser = "bit_academy";
$dbpass = "bit_academy";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $err) {
    echo "Database connection problem. " . $err->getmessage();
}
