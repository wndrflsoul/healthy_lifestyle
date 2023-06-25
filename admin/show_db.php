<!DOCTYPE html>
<html>
<?php
        if($_COOKIE['user'] == ''):
          header('Location: /index.php');
?>
<?php else:?>
<?php endif;?>
<head>
    <title>Table Viewer</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/editor/2.1.9/js/dataTables.editor.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/editor/2.1.9/css/editor.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/v/editor-1.7.1/datatables.editor.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="admin/style_adm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="app.js"></script>
</head>
<body>
    <p>Привет <?=$_COOKIE ['user']?>!</p>
    <caption>Таблица пользователей: Идентификатор, логин, имя, фамилия, возраст, номер телефона, эл. почта, пароль, роль</caption><table id="table" class="table table-bordered">

</table>
<br>
<caption>Таблица физ. показателей: Идентификатор, Идентификатор пользователей, рост, вес</caption>
<table id="table1" class="table table-bordered">

</table>
    <form action="exit_admin.php" target="_blank">
  <button class="success"><span>Выход</span></button><br>
  </form>
</body>

</html>