<!doctype html>

<html lang="ru">
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>

<head>

  <title>Трекер температуры тела</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
  <link rel="stylesheet" href="/css/style.scss">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
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
  <li><a class="active" href="/index.php">Главная</a></li>
  <li><a href="#news">Новости</a></li>
  <li><a href="#contact">Контакты</a></li>
  <li><a href="#about">О нас</a></li>
  <li><a href="#about">Профиль</a></li>
  <li><a href="/exit.php">Выйти</a></li>
</ul>
<br><br>
<p class="arterial_name"><b>Отслеживание температуры тела</b></p>
<div class="container mt-2">
<form action="temp_tracker_handler.php" method="post">
<div class="card rounded shadow shadow-sm">
        <div class="card-header">
        <div class="col">
        <p class="lead"></p>
  <label for="date">Дата измерения:</label>
  <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>

  <label for="temp">Температура:</label>
  <input type="number" step="any" name="temp" min="34" max="43" id="temp" value="0" required><br><br>

  <input type="submit" value="Подтвердить">
  <button type="button" onclick="if(confirm('Вы уверены, что хотите очистить данные?')){window.location.href='clear_temp.php'}">Очистить все данные о температуре</button>
</form>
<form action="temp_tracker_show.php" method="post">
                <button id="buttonsuccess" class="btn btn-success" type="submit">

                    Посмотреть данные

                </button>

</div>
</div>
</div>
<hr>
</body>

</html>