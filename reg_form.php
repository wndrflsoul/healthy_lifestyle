<?php

// check.php - файл, обрабатывающий регистрацию пользователя.
    $login = htmlspecialchars((trim($_POST['login'])));
    $name = htmlspecialchars((trim($_POST['name'])));
    $surname = htmlspecialchars((trim($_POST['surname'])));
    $age = htmlspecialchars((trim($_POST['age'])));
    $telephone = htmlspecialchars((trim($_POST['telephone'])));
    $email = htmlspecialchars((trim($_POST['email'])));
    $password = htmlspecialchars((trim($_POST['password'])));

    $mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');    
    $sql = "SELECT * FROM users WHERE name='$name' OR telephone='$telephone' OR email = '$email'";
    $result = mysqli_query($mysql, $sql);

    if (mysqli_num_rows($result)>0) {

        echo "Такой пользователь уже есть";

    } else {

        $mysql -> query("INSERT INTO `users`(`login`, `name`, `surname`, `age`, `telephone`, `email`, `password`) VALUES ('$login', '$name', '$surname', '$age', '$telephone','$email','$password');");
    }

    $mysql -> close();
    header('Location: /index.php');
    ?>