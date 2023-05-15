<!doctype html>

<html lang="ru">
<?php
if ($_COOKIE['user'] == ''):
  header('Location: /index.php');
?>
<?php else: ?>
<?php endif; ?>

<head>

  <title>Персональные трекеры</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/css/style.scss">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

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
      <li><a class="active" href="/index.php">Главная</a></li>
      <li><a href="#news">Новости</a></li>
      <li><a href="#contact">Контакты</a></li>
      <li><a href="#about">О нас</a></li>
      <li><a href="#about">Профиль</a></li>
      <li><a href="/exit.php">Выйти</a></li>
    </ul>
    <br><br>
    <div class="container mt-2">
      <style>
        .button_container {
          position: relative;
          left: 0;
          right: 0;
          top: 70%;
        }

        .description,
        .link {
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
          font-weight: 900;
          font-size: 25px;
          background-color: #222;
          padding: 17px 50px;
          margin: 0 auto;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.20);
          width: 600px;
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
          height: 100%;
          width: 100%;
          background: #78c7d2;
          -webkit-transition: all .5s ease-in-out;
          transition: all .5s ease-in-out;
          -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
          transform: translateX(-98%) translateY(-50%) rotate(90deg);
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
          <div class="shadow-lg p-2 mb-6 bg-white rounded">
            <p class="lead" style="font-size: 30px;" align="center">Трекеры для устранения вредных привычек</p>
          </div><br>
          <form action="nicotine_tracker.php" target="_blank">
            <button class="btn"><span>Трекер отказа от никотина</span></button><br>
          </form>
          <form action="alcohol_tracker.php" target="_blank">
            <button class="btn"><span>Трекер отказа от алкоголя</span></button><br>
          </form>
          <div class="shadow-lg p-2 mb-6 bg-white rounded">
            <p class="lead" style="font-size: 30px;" align="center">Трекеры для поддержания здоровья</p>
          </div><br>
          <form action="water_tracker.php" target="_blank">
            <button class="btn"><span>Трекер приёма воды</span></button><br>
          </form>
          <form action="weight_tracker.php" target="_blank">
            <button class="btn"><span>Трекер веса</span></button><br>
          </form>
          <div class="shadow-lg p-2 mb-6 bg-white rounded">
            <p class="lead" style="font-size: 30px;" align="center">Трекеры в случае заболевания</p>
          </div><br>
          <form action="arterial_tracker.php" target="_blank">
            <button class="btn"><span>Трекер артериального давления</span></button><br>
          </form>
          <form action="temp_tracker.php" target="_blank">
            <button class="btn"><span>Трекер температуры тела</span></button><br>
          </form>


        </div>
      </div>
      <hr>
  </body>

</html>