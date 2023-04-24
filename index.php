<!DOCTYPE HTML>

<HTML lang="ru">

    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Healty Life Style</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="stylesheet" href="/css/style.scss">

    </HEAD>

<body>
    <style>
        body {
            background-color: #fff3e2;
        }
    </style>
    <div class="container mt-4">
        <?php
        if($_COOKIE['user'] == ''):
        ?>

        <div class="header">
        <img src="mainpic.png" class="center">
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 500px;
            }
        </style>
        
        <div class="buttons">      
        <form action="reg.php"><button id="buttonreg"class="btn fourth" type="submit">Регистрация</button></form>
        
        
        <form action="login.php"><button id="buttonauth"class="btn five" type="submit">Авторизация</button></form>
        
        </div>
                
        <?php else:?>

            <?php
            header('Location: /mainpage.php');
            ?>

        <?php endif;?>
        <script src="js/password_confirm.js"></script>
    </div>

</body>
</HTML>