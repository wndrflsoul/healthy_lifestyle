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
$quit_date = htmlspecialchars((trim($_POST['quit_date'])));
$cig_per_day = htmlspecialchars((trim($_POST['cig_per_day'])));
$cost_per_pack = htmlspecialchars((trim($_POST['cost_per_pack'])));

// Вставка данных в БД
$sql = "SELECT * FROM nicotine_tracker WHERE user_id = $result[id]";
$result1 = mysqli_query($mysql, $sql);

if (mysqli_num_rows($result1) > 0) {
    $mysql->query("UPDATE `nicotine_tracker` SET `quit_date`='$quit_date', `cig_per_day`='$cig_per_day', `cost_per_pack`='$cost_per_pack' WHERE user_id = $result[id];");
    $mysql->close();
    header('Location: /func/nicotine_tracker.php');
} else {
    $mysql->query("INSERT INTO `nicotine_tracker`(`user_id`, `quit_date`, `cig_per_day`, `cost_per_pack`) VALUES ($result[id], '$quit_date', '$cig_per_day', '$cost_per_pack');");
    $mysql->close();
    header('Location: /func/nicotine_tracker.php');
}
$mysql->close();


header('Location: /func/nicotine_tracker.php');


?>