<?php

$email = htmlspecialchars((trim($_POST['email'])));
$password = htmlspecialchars((trim($_POST['password'])));
$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');   

// Выполнение запроса MySql

$result = $mysql -> query("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' AND `role` = 'admin';");
$user = $result -> fetch_assoc();

if (mysqli_num_rows($result) == 0) {
    echo "Такого пользователя не существует или данный пользователь не администратор.";
    exit();
}

// Регистрация куки текущего пользователя

setcookie('user', $user['name'], time() + 3600, "/");

$mysql -> close();
header('Location: show_db.php');

?>