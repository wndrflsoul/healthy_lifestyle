<!doctype html>

<html lang="ru">
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>

<head>

  <title>Приём лекарств</title>

  <link rel="stylesheet" href="/css/style.scss">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
<style>
        body {
            background-color: #fff3e2;
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
<div class="container mt-2">
<form action="pharma_handler.php" method="post">
Название лекарства: <input type="text" name="name" maxlength="50" id="name"><br><br>
Частота приёма (таб/день): <input type="number" name="freq_day" size="11" maxlength="11" id="freq_day"><br><br>
<button id="buttonsuccess"class="btn btn-success" type="submit">

                    Подтвердить

                </button>
</form></b>
</div>
<hr>
</body>

</html>