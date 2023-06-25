<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
  header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

  <title>Вода</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.scss">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
      <form action="water_tracker_handler.php" method="post">
        <div class="card rounded shadow shadow-sm">
          <div class="card-header">
            <div class="col">
              <p class="lead">Рекомендация Всемирной Организации Здравоохранения:<br>Человеку для хорошего качества
                жизни требуется выпивать от 2 до 3 литров воды!</p>
              <label for="date">Дата:</label>
              <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>

              <label for="amount">Количество в мл.:</label>
              <input type="number" name="amount" id="amount" value="0" readonly required><br>
              <style>
              </style>
              <br><button type="button" class="wtr250"
                onclick="document.getElementById('amount').value = parseInt(document.getElementById('amount').value) + 250;"><img
                  src="/source/250ml.png" alt="Кнопка «button»"></button><br><br>
              <button type="button" class="wtr500"
                onclick="document.getElementById('amount').value = parseInt(document.getElementById('amount').value) + 500;"><img
                  src="/source/500ml.png" alt="Кнопка «button»"></button><br><br>
              <button type="button" class="wtr1000"
                onclick="document.getElementById('amount').value = parseInt(document.getElementById('amount').value) + 1000;"><img
                  src="/source/1000ml.png" alt="Кнопка «button»"></button><br><br>
              <button type="button" class="wtr1500"
                onclick="document.getElementById('amount').value = parseInt(document.getElementById('amount').value) + 1500;"><img
                  src="/source/1500ml.png" alt="Кнопка «button»"></button><br><br>
              <button type="button"
                onclick="document.getElementById('amount').value = parseInt(document.getElementById('amount').value) * 0;">Очистить
                поле</button><br><br>
              <input type="submit" value="Подтвердить">
              <button type="button"
                onclick="if(confirm('Вы уверены, что хотите очистить данные?')){window.location.href='clear_water.php'}">Очистить
                все данные о воде</button>
      </form>

      <?php
      // Подключение к БД
      $mysql = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

      // Проверка подключения к БД
      if (!$mysql) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Получение id пользователя из куки
      $user_id = $_COOKIE['user'];
      $req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
      $result = mysqli_fetch_assoc($req_id);

      // Получение данных из базы данных
      $sql = "SELECT date, SUM(amount) AS total_water FROM water_tracker WHERE user_id = $result[id] GROUP BY date ORDER BY date ASC";
      $result = $mysql->query($sql);

      // Создание массива данных для графика
      $data = array();
      $data[] = array('Дата', 'Количество воды (мл)');
      while ($row = $result->fetch_assoc()) {
        $data[] = array($row['date'], (int) $row['total_water']);
      }


      // Закрытие соединения с базой данных
      $mysql->close();

      // Вывод графика
      ?>
      <script type="text/javascript">
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

          var options = {
            title: 'Количество выпитой воды по дням',
            legend: { position: 'none' },
            hAxis: { title: 'Дата' },
            vAxis: { title: 'Количество воды (мл)' }
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
      </script>
      <style>
        </style>
      <div id="chart_div" style="width: 900px; height: 500px; "></div>
    </div>
    </div>
    </div>
    <hr>
  </body>

</html>