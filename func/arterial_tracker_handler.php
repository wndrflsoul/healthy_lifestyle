<?php
// Подключение к БД
$mysql = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

// Проверка подключения к БД
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

// Получение данных из формы
$date = htmlspecialchars((trim($_POST['date'])));
$systolic = htmlspecialchars((trim($_POST['systolic'])));
$diastolic = htmlspecialchars((trim($_POST['diastolic'])));

// Вставка данных в БД

$mysql->query("INSERT INTO `arterial_tracker`(`user_id`, `date`, `systolic`, `diastolic`) VALUES ($result[id], '$date', '$systolic', '$diastolic');");
$mysql->close();

header('Location: /func/arterial_tracker.php');


?>