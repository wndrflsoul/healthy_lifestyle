<!DOCTYPE html>
<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
    header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>


<head>
    <title>Трекер артериального давления</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <ul>
        <li><a class="active" href="#home">Главная</a></li>
        <li><a href="#news">Новости</a></li>
        <li><a href="#contact">Контакты</a></li>
        <li><a href="#about">О нас</a></li>
        <li><a href="#about">Профиль</a></li>
        <li><a href="/exit.php">Выйти</a></li>
    </ul>
    <br><br>
    <hr>

    <div class="container mt-2">
        <div class="card rounded shadow shadow-sm">
            <div class="card-header">
                <canvas id="tempChart"></canvas>
            </div>
        </div>
    </div>


    <?php
    // Подключение к БД
    $mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

    // Проверка подключения к БД
    if (!$mysql) {
        die("Connection failed: " . mysqli_connect_error());
    }
            // Получение id текущего пользователя
            $user_id = $_COOKIE['user'];
            $req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
            $result = mysqli_fetch_assoc($req_id);

    
// Запрос для получения данных из базы данных
$query = "SELECT date, temp FROM temp_tracker WHERE user_id = $result[id]";
$result_t = $mysql->query($query);

$dates = [];
$temperatures = [];

if ($result_t->num_rows > 0) {
    while ($row = $result_t->fetch_assoc()) {
        $dates[] = $row['date'];
        $temperatures[] = $row['temp'];
    }
}

$mysql->close();
?>

<script>
        // Инициализация диаграммы
        var ctx = document.getElementById('tempChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Температура тела',
                    data: <?php echo json_encode($temperatures); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                    pointBorderColor: '#fff',
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: 'rgba(0, 123, 255, 1)',
                    pointHoverBorderColor: '#fff',
                    fill: 'origin'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        suggestedMax: 40
                    }
                }
            }
        });
    </script>
</body>
</html>