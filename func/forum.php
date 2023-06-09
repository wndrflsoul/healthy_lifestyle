<!doctype html>

<html lang="ru">
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>

<head>

  <title>Форум</title>
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
  <li><a href="/func/page_trackers.php">Трекеры</a></li>
  <li><a class="active" href="/func/forum.php">Форум</a></li>
  <li><a href="/func/pharma.php">Лекарства</a></li>
  <li><a href="/func/nutrition.php">Питание</a></li>
  <li><a href="/exit.php">Выход</a></li>
</ul>
<br><br>
<div class="container mt-2">
<form action="weight_tracker_handler.php" method="post">
<div class="card rounded shadow shadow-sm">
<h1>Добро пожаловать на форум!</h1>
</form>
<?php
// Устанавливаем соединение с базой данных
$conn = new mysqli('localhost', 'a0817883_healtylifestyle', 'kbpytwb78', 'a0817883_healtylifestyle');

if (!$conn) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}


      // Получение id пользователя из куки
      $user_id = $_COOKIE['user'];
      $req_id = $conn->query("SELECT id FROM `users` WHERE `name` = '$user_id'");
      $result = mysqli_fetch_assoc($req_id);

      $query = "SELECT topics.id, topics.title, topics.description, topics.created_at, users.name 
      FROM topics 
      INNER JOIN users ON topics.user_id = users.id
      ORDER BY topics.created_at DESC;";

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Ошибка выполнения запроса: ' . mysqli_error($conn));
}
// Вывод списка тем с информацией о текущем пользователе
if (mysqli_num_rows($result) > 0) {
    echo '<h2>Список тем:</h2>';
    echo '<ul>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo '<h3><a href="topic.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h3>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p>Дата создания: ' . $row['created_at'] . '</p>';
        echo '<p>Автор: ' . $row['name'] . '</p>';
        // Дополнительные данные и информация о теме и пользователе могут быть выведены здесь
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Нет доступных тем.</p>';
}

// Закрытие соединения с базой данных
mysqli_close($connection);
?>
<br>
<form method="POST" action="create_topic.php">
        <input type="submit" value="Создать новую тему">
    </form>


</div>
</div>
</div>
<hr>
</body>

</html>