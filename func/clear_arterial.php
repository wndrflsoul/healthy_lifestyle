<?php
// Подключение к БД
$mysql = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

// Проверка подключения к БД
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получение id пользователя из куки
$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

// SQL запрос для удаления всех записей из таблицы
$sql = "DELETE FROM arterial_tracker WHERE user_id = $result[id];";

$mysql->query($sql);


$mysql->close();
header('Location: /func/arterial_tracker.php');