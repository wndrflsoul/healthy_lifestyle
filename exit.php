<?php

setcookie('user', $user['name'], time() - 2592000, "/");

header('Location: /index.php');

?>