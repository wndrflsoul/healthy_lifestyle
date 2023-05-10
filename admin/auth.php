<!DOCTYPE HTML>

<HTML lang="ru">

    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация в админке
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.scss">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </HEAD>
<body>
<style>

    </style>
    <div class="container mt-4">
        <?php
        if($_COOKIE['user'] == ''):
        ?>
        <div class="card rounded shadow shadow-sm">
        <div class="card-header">
        <div class="col">
                <h1>Вход в админ-аккаунт</h1>
                <form action="auth_handler.php" method="post">
                <div id="error"></div>>
                <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Введите электронную почту администратора!"><br>
                </div>
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль администратора!"><br>
                <button id="buttonsuccess"class="btn btn-success" type="submit">

                    Подтвердить

                </button>
                </form>
            </div>
        </div>
        </div>
    </div>
        <?php else:?>
<?php
header('Location: show_db.php');
?>
</div>


<?php endif;?>
        
        </body>
        </html>