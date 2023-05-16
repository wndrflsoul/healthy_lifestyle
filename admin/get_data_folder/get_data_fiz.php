<?php
// подключение к БД
$dsn = "mysql:host=localhost;dbname=a0817883_healtylifestyle";
$username = "a0817883_healtylifestyle";
$password = "kbpytwb78";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}

// получение данных из БД
$stmt = $pdo->query("SELECT * FROM physical_index");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);