<?php
// Подключение к БД
$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

// Проверка подключения к БД
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получение id пользователя из куки
$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

// SQL запрос для удаления всех записей из таблицы
$sql = "DELETE FROM temp_tracker WHERE user_id = $result[id];";

$mysql->query($sql);


$mysql->close();
header('Location: /func/temp_tracker.php');