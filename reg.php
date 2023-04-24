<!DOCTYPE HTML>

<HTML lang="ru">

    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Регистрация
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </HEAD>
<body>
    <div class="container mt-4">
        <?php
        if($_COOKIE['user'] == ''):
        ?>
<div class="card rounded shadow shadow-sm">
        <div class="card-header">
        <div class="col">
                <h1>Регистрация</h1>
                <form action="reg_form.php" method="post">
                <div id="error"></div>>
                <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию"><br>
                <input type="text" class="form-control" name="age" id="age" placeholder="Введите возраст"><br>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Введите номер телефона"><br>
                <input type="text" class="form-control" name="email" id="email" placeholder="Введите электронную почту пользователя!"><br>
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль пользователя!"><br>
                <input type="text" class="form-control" name="repassword" id="repassword" placeholder="Подтвердите пароль!"><br>
                <button id="buttonsuccess"class="btn btn-success" type="submit">

                    Подтвердить

                </button>
                </form>
                <script src="js/password_confirm.js"></script>
            </div>
        </div>
</div>
        <?php else:?>
<?php
header('Location: /');
?>
</div>


<?php endif;?>
        
        </body>
        </html>