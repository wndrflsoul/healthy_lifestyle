<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
  header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

  <title>Советы по питанию</title>
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
  <li><a href="/func/page_trackers.php">Трекеры</a></li>
  <li><a href="/func/forum.php">Форум</a></li>
  <li><a href="/func/pharma.php">Лекарства</a></li>
  <li><a class="active" href="/func/nutrition.php">Питание</a></li>
  <li><a href="/exit.php">Выход</a></li>
</ul>
    <br><br>
    <p class="arterial_name"><b>Советы по питанию</b></p>
    <div class="container mt-2">
      <form action="nutrition_handler.php" method="post">
        <div class="card rounded shadow shadow-sm">
          <div class="card-header">
            <div class="col">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение значения ИМТ из формы
    $bmi = floatval($_POST['bmi']);

    // Вычисление рекомендаций на основе значения ИМТ
    $recommendations = getDietRecommendations($bmi); // Функция, которую вам нужно реализовать

    // Отображение рекомендаций
    echo '<h3>Рекомендации по питанию:</h3>';
    echo $recommendations;
}

function getDietRecommendations($bmi) {
    // Здесь вы можете определить и вернуть рекомендации на основе значения ИМТ
    // Например, с использованием условных операторов или базы данных
    // Верните строку с HTML-разметкой, содержащую рекомендации

    // Пример рекомендаций
    if ($bmi < 18.5) {
        $breakfast = "Омлет с овощами и хлебцы из цельнозерновой муки";
        $lunch = "Греческий салат и куриная грудка на гриле";
        $dinner = "Красный рис с овощами и тунец в соевом соусе";
        $snack = "Миндаль и ягоды";
        $dessert = "Йогурт с медом и орехами";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        $breakfast = "Овсянка с ягодами и миндальными лепестками";
        $lunch = "Куриный салат с оливковым маслом и овощами";
        $dinner = "Телятина с запеченным картофелем и зеленым горошком";
        $snack = "Яблоко и молоко";
        $dessert = "Творог с медом и ягодами";
    } else {
        $breakfast = "Тосты с авокадо и яйцом";
        $lunch = "Цезарь с креветками и пармезаном";
        $dinner = "Лосось на гриле с картофельным пюре и шпинатом";
        $snack = "Грецкие орехи и сушеные фрукты";
        $dessert = "Фруктовый салат с йогуртом";
    }

    $html = "<h4>Завтрак:</h4><p>{$breakfast}</p>";
    $html .= "<h4>Обед:</h4><p>{$lunch}</p>";
    $html .= "<h4>Ужин:</h4><p>{$dinner}</p>";
    $html .= "<h4>Полдник:</h4><p>{$snack}</p>";
    $html .= "<h4>Десерт:</h4><p>{$dessert}</p>";

    $waterRecommendation = getWaterRecommendation($bmi);
    $html .= "<h4>Рекомендация по потреблению воды:</h4>";
    $html .= "<p>{$waterRecommendation}</p>";

    return $html;
}

function getWaterRecommendation($bmi) {
    // Здесь вы можете определить и вернуть рекомендацию по потреблению воды
    // Верните строку с текстом рекомендации

    // Пример рекомендации по потреблению воды
    if ($bmi < 18.5) {
        return "Рекомендуется увеличить потребление воды до 2-2,5 литров в день.";
    } elseif ($bmi >= 18.5 && $bmi < 25) {
        return "Рекомендуется потреблять около 2 литров воды в день.";
    } else {
        return "Рекомендуется поддерживать потребление воды на уровне 2-2,5 литров в день.";
    }
}
?>
</form>
    </div>
    </div>
    </div>
    <hr>
  </body>

</html>

