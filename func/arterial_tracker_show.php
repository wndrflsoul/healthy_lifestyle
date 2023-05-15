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
                <canvas id="bloodPressureChart"></canvas>
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

    
    // Получение данных из базы данных
    $sql = "SELECT * FROM arterial_tracker WHERE user_id = $result[id] ORDER BY date ASC;";
    $result = $mysql->query($sql);

    $dates = array();
    $systolic = array();
    $diastolic = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($dates, $row["date"]);
            array_push($systolic, $row["systolic"]);
            array_push($diastolic, $row["diastolic"]);
        }
    }

    // Закрытие соединения с базой данных
    $mysql->close();
    ?>
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

        // Получение среднего систолического
        $sql_avg_s = "SELECT AVG(systolic) as avg_systolic FROM arterial_tracker WHERE user_id = $result[id];";
        $avg_s = $mysql->query($sql_avg_s);
    
        // Получение среднего диастолического
        $sql_avg_d = "SELECT AVG(diastolic) as avg_diastolic FROM arterial_tracker WHERE user_id = $result[id];";
        $avg_d = $mysql->query($sql_avg_d);
    
        // Обработка результата запроса и вывод на экран
        if ($result && mysqli_num_rows($avg_s) > 0) {
            $row = mysqli_fetch_assoc($avg_s);
            $result_systolic = $row["avg_systolic"];
        } else {
            echo "Нет данных о верхнем давлении";
        }
        if ($result && mysqli_num_rows($avg_d) > 0) {
            $row = mysqli_fetch_assoc($avg_d);
            $result_diastolic = $row["avg_diastolic"];
        } else {
            echo "Нет данных о нижнем давлении";
        }
    ?>
        <div class="container mt-2">
        <div class="card rounded shadow shadow-sm">
            <h4 class="display-6">Данные о давлении:</h4>
    <p class="lead">Ваше среднее верхнее давление <?=round($result_systolic)?></p>
    <p class="lead">Ваше среднее нижнее давление <?=round($result_diastolic)?></p>
    <?php
    if (($result_systolic > 135) || ($result_diastolic > 95)) {
        $conc = "В последнее время у вас слегка повышенное давление. Рекомендуем чаще заниматься спортивной деятельностью.";
    }
    else if (($result_systolic > 150) || ($result_diastolic > 105)) {
        $conc = "В последнее время у вас слишком высокое давление. Рекомендуем обратиться к специалисту.";
    }
    else if (($result_systolic < 120) || ($result_diastolic < 80)) {
        $conc = "В последнее время у вас немного пониженное давление. Рекомендуем чаще заниматься спортивной деятельностью.";
    }
    else if (($result_systolic < 100) || ($result_diastolic < 60)) {
        $conc = "В последнее время у вас слишком низкое давление. Рекомендуем обратиться к специалисту.";
    }
    else if (($result_systolic > 120 && $result_systolic < 135) || ($result_diastolic > 80 && $result_diastolic < 95)) {
        $conc = "Отлично! Ваше давление в норме!";
    }
    else
    {
        $conc = "";
    }
    ?>
    <p class="lead"><?=$conc?></p>
        </div>
    </div>
    <script>
        // Создание графика с помощью библиотеки Chart.js
        var ctx = document.getElementById("bloodPressureChart").getContext("2d");
        var bloodPressureChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Верхнее давление',
                    data: <?php echo json_encode($systolic); ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: false
                }, {
                    label: 'Нижнее давление',
                    data: <?php echo json_encode($diastolic); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'График артериального давления',
                    fontColor: '#333',
                    fontSize: 20,
                    padding: 20
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: '#333',
                        fontSize: 16,
                        padding: 20
                    }
                },

                tooltips: {
                    mode: 'intersect',
                    intersect: true,
                    titleFontColor: '#333',
                    bodyFontColor: '#333',
                    backgroundColor: '#f5f5f5',
                    titleFontSize: 16,
                    bodyFontSize: 14,
                    titleMarginBottom: 10,
                    bodySpacing: 10,
                    xPadding: 12,
                    yPadding: 12,
                    cornerRadius: 6,
                },
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'DD.MM.YYYY'
                            }
                        },
                        ticks: {
                            fontColor: '#333',
                            fontSize: 14,
                            padding: 10
                        },
                        gridLines: {
                            color: '#eee',
                            lineWidth: 1,
                            drawBorder: false,
                            drawTicks: false,
                            zeroLineColor: '#eee'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: '#333',
                            fontSize: 14,
                            padding: 10,
                            min: 60,
                            max: 180,
                            stepSize: 20
                        },
                        gridLines: {
                            color: '#eee',
                            lineWidth: 1,
                            drawBorder: false,
                            drawTicks: false,
                            zeroLineColor: '#eee'
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>