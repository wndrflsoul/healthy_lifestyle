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
    <div class="content">
        <h2 class="text_shadows">H - L - S</h2>
    </div>
    <div class="container mt-4">

        <?php
        if ($_COOKIE['user'] == ''):
            ?>

            <div class="header">
                <br><br><br><br><br>
                <div class="buttons">
                    <form action="reg.php"><button id="buttonreg" class="button-74" type="submit">Регистрация</button>
                    </form><br>
                    <form action="login.php"><button id="buttonauth" class="button-74" type="submit">Авторизация</button>
                    </form><br>
                    <form action="admin/auth.php"><button id="buttonauth" class="button-74" type="submit">Для администратора
                            ИС</button></form>

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