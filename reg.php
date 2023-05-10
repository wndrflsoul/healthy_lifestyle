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
<style>
        body {
          background: -webkit-linear-gradient(337deg, #5680e9,#5ab9ea,#c1c8e4);/* Chrome 10-25, Safari 5.1-6 */                          
          background: linear-gradient(337deg, #5680e9,#5ab9ea,#c1c8e4);/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */                                             
        }
    </style>
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
                <input type="text" class="form-control" name="login" id="login" required placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Введите имя"><br>
                <input type="text" class="form-control" name="surname" id="surname" required placeholder="Введите фамилию"><br>
                <input type="text" class="form-control" name="age" id="age" min="10" max="99" required placeholder="Введите возраст от 10 до 99"><br>
                <input type="text" class="form-control" name="telephone" id="telephone" pattern="^\+7\s\(\d{3}\)\s\d{3}\-\d{2}\-\d{2}$" required placeholder="Введите номер телефона! Пример: +70000000000"><br>
                <input type="text" class="form-control" name="email" id="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" required placeholder="Введите электронную почту пользователя! Пример: example@example.com"><br>
                <input type="password" class="form-control" name="password" id="password" minlength="8" required placeholder="Введите пароль пользователя! Не менее 8 символов"><br>
                <input type="password" class="form-control" name="repassword" id="repassword" minlength="8" required placeholder="Подтвердите пароль!"><br>
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