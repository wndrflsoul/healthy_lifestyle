<!doctype html>

<html lang="ru">
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>

<head>

  <title>Трекер веса</title>
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
<form action="weight_tracker_handler.php" method="post">
<div class="card rounded shadow shadow-sm">
        <div class="card-header">
        <div class="col">
        <p class="lead"></p>
  <label for="date">Дата:</label>
  <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>

  <label for="weight">Вес в кг.:</label>
  <input type="number" name="weight" id="weight" value="0" required><br><br>

  <input type="submit" value="Подтвердить">
  <button type="button" onclick="if(confirm('Вы уверены, что хотите очистить данные?')){window.location.href='clear_weight.php'}">Очистить все данные о весе</button>
</form>
<?php
// Устанавливаем соединение с базой данных
$conn = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

      // Получение id пользователя из куки
      $user_id = $_COOKIE['user'];
      $req_id = $conn->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
      $result = mysqli_fetch_assoc($req_id);


// Получаем данные о весе пользователя из базы данных
$sql = "SELECT date, weight FROM weight_tracker WHERE user_id = $result[id] ORDER BY date ASC;";
$result_w = mysqli_query($conn, $sql);

// Формируем массив данных для графика
$data = array();
while ($row = mysqli_fetch_assoc($result_w)) {
  $data[$row['date']] = $row['weight'];
}

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
<canvas id="myChart"></canvas>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?= json_encode(array_keys($data)) ?>,
      datasets: [{
        label: 'Вес',
        data: <?= json_encode(array_values($data)) ?>,
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        fill: true
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  </script>

</div>
</div>
</div>
<hr>
</body>

</html>