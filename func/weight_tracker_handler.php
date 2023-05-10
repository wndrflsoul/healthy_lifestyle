<?php
// Подключение к БД
$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

// Проверка подключения к БД
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

// Получение данных из формы
$date = htmlspecialchars((trim($_POST['date'])));
$weight = htmlspecialchars((trim($_POST['weight'])));

// Вставка данных в БД

$mysql->query("INSERT INTO `weight_tracker`(`user_id`, `date`, `weight`) VALUES ($result[id], '$date', '$weight');");
$mysql->close();

header('Location: weight_tracker.php');


?>