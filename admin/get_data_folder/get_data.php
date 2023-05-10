<?php
// подключение к БД
$dsn = "mysql:host=localhost;dbname=healtylifestyle";
$username = "root";
$password = "root";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}

// получение данных из БД
$stmt = $pdo->query("SELECT * FROM users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);