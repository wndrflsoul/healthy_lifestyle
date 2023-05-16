<!DOCTYPE HTML>

<HTML lang="ru">

<HEAD>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Healty Life Style</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="css/style.scss">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }
    </style>
</HEAD>
<!--
    TODO:
    1. Разработать адаптивную вёрстку под мобильные устройства
    2. Убрать кнопку для админов, сделать всё в одной авторизации
    3. Доделать все трекеры
    4. Раработать мотивационные окна на гл. странице
    5. Разработать питание
    6. Проработать лекарства, сделать через SMS/Push/Email уведомления
    7. Добавить функцию медитаций с выбором темы и включением мелодии
    8. Начать делать форум
    9. Поправить вёрстку (дизайн), новый логотип ВЫПОЛНЕНО
    10. Поставить на хост, на домен wndrflsoul.ru
    11. Разработать мобильное приложение в конструкторе
    12. Добавить QR-код и ссылку на скаичвание мобильного приложения 
    -->
<body>
<style>
  .content {
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
  }
  .text_shadows {
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 100%;
  }
    

  </style>
    <div class="content">
        <h2 class="text_shadows">H - L - S</h2>
    </div>

    <div class="container mt-4">
        
        <?php
        if ($_COOKIE['user'] == ''):
            ?>

<style>
  p.center {
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    margin-bottom: auto;
    width: 10em
  }
    p.title_1 {
        color:white;
      font-size: 20px;
      font-family: 'Montserrat', sans-serif;
    }
  </style>

<div class="shadow-lg p-2 mb-6 bg-white rounded">
  <p class="center">Healthy - Life - Style</p>
</div>
            <div class="header">
</div>
                <br>
                <p class="title_1">Мы верим, что наш сайт поможет вам вести здоровый образ жизни, достичь ваших фитнес-целей и улучшить ваше самочувствие. Регистрируйтесь на нашем сайте уже сегодня и начните путешествие к здоровому и сбалансированному образу жизни!</p>
                <div class="shadow-lg p-2 mb-6 bg-white rounded">
  <p class="center">Healthy - Life - Style</p>
</div><br>
                <div class="buttons">
                    <form action="reg.php"><button id="buttonreg" class="button-74" type="submit">Регистрация</button>
                    </form><br>
                    <form action="login.php"><button id="buttonauth" class="button-74" type="submit">Авторизация</button>
                    </form><br>


                </div>

            <?php else: ?>
                <?php
                header('Location: /mainpage.php');
                ?>
            <?php endif; ?>
            <script src="js/password_confirm.js"></script>
    </div>
</body>
</HTML>