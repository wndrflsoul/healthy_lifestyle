<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
    header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

    <title>Отслеживание отказа от курения</title>

    <link rel="stylesheet" href="/css/style.scss">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

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
  <li><a href="/index.php">Главная</a></li>
  <li><a href="/func/physical_index.php">Показатели</a></li>
  <li><a class="active" href="/func/page_trackers.php">Трекеры</a></li>
  <li><a href="/func/forum.php">Форум</a></li>
  <li><a href="/func/pharma.php">Лекарства</a></li>
  <li><a href="/func/nutrition.php">Питание</a></li>
  <li><a href="/exit.php">Выход</a></li>
</ul>
        <br><br>
        <div class="container mt-2">
            <p class="nicotine_name"><b>Отслеживание отказа от курения</b></p>
            <form action="nicotine_tracker_handler.php" method="post">
                <div class="card rounded shadow shadow-sm">
                    <div class="card-header">
                        <div class="col">
                            <p class="lead"></p>
                            <label for="quit_date">Дата начала отказа:</label>
                            <input type="date" name="quit_date" id="quit_date" value="<?php echo date('Y-m-d'); ?>"
                                required><br><br>

                            <label for="cig_per_day">Сигареты в день (шт.):</label>
                            <input type="number" name="cig_per_day" id="cig_per_day" value="0" required><br><br>

                            <label for="cost_per_pack">Цена за упаковку (руб.):</label>
                            <input type="number" name="cost_per_pack" id="cost_per_pack" value="0" required><br><br>

                            <input type="submit" value="Подтвердить">
                            <button type="button"
                                onclick="if(confirm('Вы уверены, что хотите очистить данные?')){window.location.href='clear_nicotine.php'}">Очистить
                                все данные о сигаретах</button>
            </form>

            <form action="nicotine_tracker_show.php" method="post">
                <button id="buttonsuccess" class="btn btn-success" type="submit">

                    Посмотреть данные

                </button>
            </form>
        </div>
        </div>
        </div>
        <hr>
    </body>

</html>