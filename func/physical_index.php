<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
  header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

  <title>Физические показатели</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
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
  <li><a href="/index.php">Главная</a></li>
  <li><a class="active" href="/func/physical_index.php">Показатели</a></li>
  <li><a href="/func/page_trackers.php">Трекеры</a></li>
  <li><a href="/func/forum.php">Форум</a></li>
  <li><a href="/func/pharma.php">Лекарства</a></li>
  <li><a href="/func/nutrition.php">Питание</a></li>
  <li><a href="/exit.php">Выход</a></li>
</ul>
    <br><br>
    <div class="container mt-2">
      <form action="physical_index_handler.php" method="post">
        <div class="card rounded shadow shadow-sm">
          <div class="card-header">
            <div class="col">
              <div id="error"></div>>
              <input type="text" class="form-control" name="height" id="height" placeholder="Введите ваш рост"><br>
              <input type="text" class="form-control" name="weight" id="weight" placeholder="Введите ваш вес"><br>
              <p>Ваш пол:</p>
              <input type="radio" name="gender" id="gender">Мужсокй<br>
              <input type="radio" name="gender" id="gender">Женский<br>
              <button id="buttonsuccess" class="btn btn-success" type="submit">

                Подтвердить

              </button>
      </form></b>

      <form action="/func/physical_index_show.php" method="post">
        <button id="buttonsuccess" class="btn btn-success" type="submit">

          Посмотреть данные

        </button>
      </form>
    </div>
    <hr>
  </body>

</html>