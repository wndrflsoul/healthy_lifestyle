<?php


$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

$user_id = $_COOKIE['user'];
$req_id = $mysql -> query("SELECT id FROM `users` WHERE `name` = '$user_id'");
$result = mysqli_fetch_assoc($req_id);

$name = htmlspecialchars((trim($_POST['name'])));
$freq_day = htmlspecialchars((trim($_POST['freq_day'])));
 

$mysql -> query("INSERT INTO `medications`(`user_id`, `name`, `freq_day`) VALUES ($result[id], '$name', '$freq_day');");
$mysql -> close();
?>