<?php
// Подключение к БД
$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

// Проверка подключения к БД
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_COOKIE['user'];
$req_id = $mysql -> query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

// Получение данных из формы
$date = htmlspecialchars((trim($_POST['date'])));
$amount = htmlspecialchars((trim($_POST['amount'])));

// Вставка данных в БД

$mysql -> query("INSERT INTO `water_tracker`(`user_id`, `date`, `amount`) VALUES ($result[id], '$date', '$amount');");
$mysql -> close();

header('Location: /func/water_tracker.php');


?>