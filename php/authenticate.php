<?php
  // MYSQL Settings 
  $DB_HOST = "localhost:3308";
  $DB_USER = "root";
  $DB_PASSWORD = "";
  $DB_NAME = "uzmandb";
  
  // Database connection (Security)
  try {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
  }
?>