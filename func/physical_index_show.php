<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
    header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

    <title>Приём лекарств</title>

    <link rel="stylesheet" href="/css/style.scss">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
    <style>
        body {
            background: -webkit-linear-gradient(337deg, #5680e9, #5ab9ea, #c1c8e4);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(337deg, #5680e9, #5ab9ea, #c1c8e4);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>


    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            border: 1px solid #e7e7e7;
            background-color: #f3f3f3;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: #666;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #ddd;
        }

        li a.active {
            color: white;
            background-color: #4CAF50;
        }
    </style>
    </head>

    <body>

        <ul>
            <li><a class="active" href="#home">Главная</a></li>
            <li><a href="#news">Новости</a></li>
            <li><a href="#contact">Контакты</a></li>
            <li><a href="#about">О нас</a></li>
            <li><a href="#about">Профиль</a></li>
            <li><a href="/exit.php">Выйти</a></li>
        </ul>
        <br><br>
        <?php

        $mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

        $user_id = $_COOKIE['user'];
        $req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'"); // Берёт id текущего пользователя
        $result = mysqli_fetch_assoc($req_id);

        $height_res = $mysql->query("SELECT height FROM `physical_index` WHERE user_id = $result[id];"); // Берёт рост текущего пользователя
        $result_height = mysqli_fetch_assoc($height_res);
        $weight_res = $mysql->query("SELECT weight FROM `physical_index` WHERE user_id = $result[id];"); // Берёт вес текущего пользователя
        $result_weight = mysqli_fetch_assoc($weight_res);

        $mysql->close();

        $calc_BMI = ($result_weight['weight'] / ($result_height['height'] * $result_height['height'])) * 10000;
        $calc_BMI = (int) $calc_BMI;
        $out;

        if ($calc_BMI < 18) {
            $out = "У вас недостаток веса.";
        } else if ($calc_BMI <= 18 || $calc_BMI < 25) {
            $out = "Ваш вес в пределах нормы.";
        } else if ($calc_BMI <= 25 || $calc_BMI < 35) {
            $out = "У вас избыточный вес.";
        } else if ($calc_BMI < 35 || $calc_BMI < 40) {
            $out = "У вас первая стадия ожирения.";
        } else if ($calc_BMI < 45 || $calc_BMI < 45) {
            $out = "У вас вторая стадия ожирения.";
        } else if ($calc_BMI < 45 || $calc_BMI < 200) {
            $out = "У вас третья стадия ожирения.";
        }
        ?>
        <div class="container mt-2">
            <label>Ваш ИМТ:
                <?php echo $calc_BMI ?>
            </label><br>
            <label>
                <?php echo $out ?>
            </label>
        </div>
        <hr>
    </body>

</html>