<!doctype html>

<html lang="ru">
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>

<head>

  <title>Главная страница</title>

  <link rel="stylesheet" href="/css/style.scss">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

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
  <li><a class="active" href="index.php">Главная</a></li>
  <li><a href="/func/physical_index.php">Показатели</a></li>
  <li><a href="/func/page_trackers.php">Трекеры</a></li>
  <li><a href="/func/forum.php">Форум</a></li>
  <li><a href="/func/pharma.php">Лекарства</a></li>
  <li><a href="/func/nutrition.php">Питание</a></li>
  <li><a href="exit.php">Выход</a></li>
</ul>


<div class="container mt-5">
<div class="col">
  <style>
    .title1
    {
      color:white;
      font-family: 'Montserrat', sans-serif;
    }
    .lead
    {
      color:white;
      font-size: 25px;
      font-family: 'Montserrat', sans-serif;
    }
    .about
    {
      color:white;
      font-size: 20px;
      font-family: 'Montserrat', sans-serif;
    }
    </style>
<h1 class="title1">Здоровый образ жизни!</h1>
<br>
<h2 class="title1"><?=$_COOKIE ['user']?>, добро пожаловать на сайт, посвящённый<br />поддержке здорового образа жизни!</h2>
<br>

<p class="lead">Мы верим, что здоровье - это самое ценное, что у нас есть. Поэтому мы разработали этот сайт,<br />чтобы помочь Вам следить за своим здоровьем и достигать лучших результатов!</p>
</div>

<style>
  p.center {
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 6em
    
  }
  </style>
<br><br>
<div class="shadow-lg p-2 mb-6 bg-white rounded">
  <p class="center">Функции</p>
</div>
<br>


<style>
  .button_container {
  position: relative;
  left: 0;
  right: 0;
  top: 70%;
}

.description, .link {
  font-family: 'Amatic SC', cursive;
  text-align: center;
}

.description {
  font-size: 35px;
}

.btn {
  border: none;
  display: block;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
  outline: none;
  overflow: hidden;
  position: relative;
  color: #fff;
  font-weight: 700;
  font-size: 60px;
  background-color: #222;
  padding: 17px 60px;
  margin: 0 auto;
  box-shadow: 0 5px 15px rgba(0,0,0,0.20);
  width: 800px;
  height: 200px;
}

.btn span {
  position: relative; 
  z-index: 1;
}

.btn:after {
  content: "";
  position: absolute;
  left: 0;
  top: 100px;
  height: 490%;
  width: 140%;
  background: #78c7d2;
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
  transform: translateX(-98%) translateY(-25%) rotate(45deg);
}

.btn:hover:after {
  -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
  transform: translateX(-9%) translateY(-25%) rotate(45deg);
}

.link {
  font-size: 20px;
  margin-top: 30px;
}


  </style>
  <style>
    
    </style>
  <div id="1">
  <div class="button_container">
  <form action="func/physical_index.php" target="_blank">
  <button class="btn"><span>Физические показатели</span></button><br>
  </form>
  <form action="func/page_trackers.php" target="_blank">
  <button class="btn"><span>Персональные трекеры</span></button><br>
  </form>
  <form action="func/forum.php" target="_blank">
  <button class="btn"><span>Форум</span></button><br>
  </form>
  <form action="func/pharma.php" target="_blank">
  <button class="btn"><span>Отслеживание лекарств</span></button><br>
  </form>
  <form action="func/nutrition.php" target="_blank">
  <button class="btn"><span>Советы по питанию</span></button><br>
  </form>
</div>

</div>
<div class="shadow-lg p-2 mb-6 bg-white rounded">
  <p class="center">Подробнее</p>
</div>
<div class="container mt-4">
<h1 class="about">1. Трекеры здорвья</h1>
<br>
<h2 class="about">С нашими удобными трекерами здоровья вы сможете следить за своими физическими показателями и оценивать свой прогресс. Записывайте данные о вашем пульсе, кровяном давлении, уровне физической активности и других важных показателях. Анализируйте эти данные и получайте ценные сведения о своем здоровье.</h2>
<br>
<h1 class="about">2. Питание</h1>
<br>
<h2 class="about">Правильное питание играет важную роль в здоровом образе жизни. Наш сайт предлагает вам возможность вести учет вашего питания. Записывайте продукты, которые вы употребляете, и оценивайте их пищевую ценность. Мы также предоставляем рекомендации о сбалансированном рационе и питательных веществах, которые помогут вам принимать информированные решения о своем питании.</h2>
<br>
<h1 class="about">3. Отслеживание лекарств</h1>
<br>
<h2 class="about">Не забывайте принимать важные лекарства вовремя. Наш сайт предоставляет возможность создавать напоминания о приеме лекарств и отслеживать ваш график приема. Будьте уверены, что вы не пропустите важную дозу и сможете следить за своим здоровьем эффективно.</h2>
<br>
<h1 class="about">4. Советы по питанию</h1>
<br>
<h2 class="about">В разделе "Советы по питанию" мы предлагаем полезные рекомендации и советы от опытных специалистов по здоровому питанию. Узнайте о новейших исследованиях, советах по снижению веса, поддержанию энергии, правильному питанию для спорттивных нагрузок и многом другом. Мы стремимся предоставить вам актуальную и достоверную информацию, которая поможет вам принимать информированные решения о вашем питании.</h2>
<br>
<h1 class="about">5. Форум</h1>
<br>
<h2 class="about">На нашем сайте вы также сможете присоединиться к нашему активному сообществу, где вы сможете обмениваться опытом, задавать вопросы, делиться своими достижениями и находить поддержку. Вместе мы создаем мотивирующую и поддерживающую среду для достижения здорового образа жизни.</h2>
<br><br>


</div>
</body>

</html>