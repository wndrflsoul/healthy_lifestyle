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
$quit_date = htmlspecialchars((trim($_POST['quit_date'])));
$alco_per_day = htmlspecialchars((trim($_POST['alco_per_day'])));
$cost_per_pack = htmlspecialchars((trim($_POST['cost_per_pack'])));

// Вставка данных в БД
$sql = "SELECT * FROM alcohol_tracker WHERE user_id = $result[id]";
$result1 = mysqli_query($mysql, $sql);

if (mysqli_num_rows($result1) > 0) {
    $mysql->query("UPDATE `alcohol_tracker` SET `quit_date`='$quit_date', `alco_per_day`='$alco_per_day', `cost_per_pack`='$cost_per_pack' WHERE user_id = $result[id];");
    $mysql->close();
    header('Location: /func/alcohol_tracker.php');
} else {
    $mysql->query("INSERT INTO `alcohol_tracker`(`user_id`, `quit_date`, `alco_per_day`, `cost_per_pack`) VALUES ($result[id], '$quit_date', '$alco_per_day', '$cost_per_pack');");
    $mysql->close();
    header('Location: /func/alcohol_tracker.php');
}
$mysql->close();


header('Location: /func/alcohol_tracker.php');


?>