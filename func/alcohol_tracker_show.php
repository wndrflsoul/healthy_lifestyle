<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
    header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

    <title>Отслеживание отказа от алкоголя</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>

</head>

<body>
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
        <hr>
        <?php
// Подключение к БД
$mysql = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'"); // Берёт id текущего пользователя
$result = mysqli_fetch_assoc($req_id);

// Выполняем запрос к базе данных для получения даты
$stmt = $mysql->query("SELECT quit_date FROM alcohol_tracker WHERE user_id = $result[id];");

// Выполняем запрос к базе данных для получения алкоголя в день
$stmtAlco = $mysql->query("SELECT alco_per_day FROM alcohol_tracker WHERE user_id = $result[id];");

// Выполняем запрос к базе данных для получения цены за упаковку
$stmtCost = $mysql->query("SELECT cost_per_pack FROM alcohol_tracker WHERE user_id = $result[id];");

// Извлечение даты из результата запроса
$row = mysqli_fetch_assoc($stmt);
$dateFromDB = $row['quit_date'];

// Создаем объект DateTime для даты из БД
$datetimeFromDB = new DateTime($dateFromDB);

// Создаем объект DateTime для текущей даты
$datetimeNow = new DateTime();

// Вычисляем разницу между двумя датами в днях
$interval = $datetimeFromDB->diff($datetimeNow);
$days = $interval->days;


// Извлечение кол-ва сигарет из результата запроса
$rowAlco = mysqli_fetch_assoc($stmtAlco);
$notAlco = $rowAlco['alco_per_day'];

$notAlcohol = $days * $notAlco;

// Извлечение цены из результата запроса
$rowCost = mysqli_fetch_assoc($stmtCost);
$freeCost = $rowCost['cost_per_pack'];

$freeMoney = $notAlcohol * ($freeCost / $notAlco);


mysqli_close($mysql);
?>
<style>
#line_block { 
    width:1000px; 
        height:50px; 
        float:left; 
        margin: 0 15px 15px 0; 
        text-align:left;
        padding: 1px;
}
</style>
    <div class="container mt-2">
        <div class="card rounded shadow shadow-sm">
          <div class="card-header">
            <div id="line_block" class="text">
            <p class="lead">Дата отказа от алкоголя: <?=$dateFromDB?></p>
            <p class="lead">Не выпито алкоголя: <?=$notAlcohol?> мл.</p>
            <p class="lead">Сэкономленные средства: <?=$freeMoney?> рублей.</p>
            </div>
            <div id="circle"></div>
            <style>
                svg {
                    width: 200px;
                    height: 200px;
                }
                </style>
            <script>
// Задаем значение числа от 0 до 365
number = <?=$days?>;
daysWord = "день";
if (number % 10 == 1 && number % 100 != 11) {
  daysWord = "день";
} else if (number % 10 >= 2 && number % 10 <= 4 && (number % 100 < 10 || number % 100 >= 20)) {
  daysWord = "дня";
} else {
  daysWord = "дней";
}

// Создаем элемент svg и добавляем его в div
const svg = d3.select("#circle")
  .append("svg")
  .attr("width", 200)
  .attr("height", 200);

// Создаем градиентный цвет для круга
const gradient = svg.append("defs")
  .append("radialGradient")
  .attr("id", "gradient")
  .attr("cx", "50%")
  .attr("cy", "50%")
  .attr("r", "50%");

gradient.append("stop")
  .attr("offset", "0%")
  .attr("stop-color", "white")
  .attr("stop-opacity", "1");

gradient.append("stop")
  .attr("offset", "100%")
  .attr("stop-color", "white")
  .attr("stop-opacity", "0");

// Вычисляем значение цвета в зависимости от числа
const color = d3.scaleLinear()
  .domain([0, 365])
  .range(["green", "red"]);

// Создаем круг и задаем ему градиентный цвет и тень
svg.append("circle")
  .attr("cx", 100)
  .attr("cy", 100)
  .attr("r", 80)
  .attr("fill", "url(#gradient)")
  .attr("stroke", color(number))
  .attr("stroke-width", 12)
  .attr("filter", "url(#shadow)");

// Создаем тень
svg.append("filter")
  .attr("id", "shadow")
  .append("feDropShadow")
  .attr("dx", "0")
  .attr("dy", "4")
  .attr("stdDeviation", "4")
  .attr("flood-color", "#333")
  .attr("flood-opacity", "0.4");

// Добавляем текст с числом в центр круга и используем красивый шрифт
svg.append("text")
  .attr("x", 100)
  .attr("y", 100)
  .attr("text-anchor", "middle")
  .attr("alignment-baseline","central")
.text(number + " " + daysWord)
.style("font-family", "Montserrat")
.style("font-size", "30px")
.style("fill", color(number));
  </script>
          </div>
        </div>
    </div>
    </body>

</html>