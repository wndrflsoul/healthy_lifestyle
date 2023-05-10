<?php


$mysql = new mysqli('localhost', 'root', 'root', 'healtylifestyle');

$user_id = $_COOKIE['user'];
$req_id = $mysql->query("SELECT id FROM `users` WHERE `name` = '$user_id'"); // Берёт id текущего пользователя
$result = mysqli_fetch_assoc($req_id);

$height = htmlspecialchars((trim($_POST['height'])));
$weight = htmlspecialchars((trim($_POST['weight'])));
if ($height < 120 || $height > 210) {
    echo "Рост должен быть от 120 до 210 см!";
} else if ($weight < 20 || $weight > 200) {
    echo "Вес должен быть от 20 до 200 кг!";
} else {
    $sql = "SELECT * FROM physical_index WHERE user_id=$result[id]";
    $result1 = mysqli_query($mysql, $sql);

    if (mysqli_num_rows($result1) > 0) {
        $mysql->query("UPDATE `physical_index` SET `height`='$height', `weight`='$weight' WHERE user_id = $result[id];");
        $mysql->close();
        header('Location: /func/physical_index.php');
    } else {
        $mysql->query("INSERT INTO `physical_index`(`user_id`, `height`, `weight`) VALUES ($result[id], '$height', '$weight');");
        $mysql->close();
        header('Location: /func/physical_index.php');
    }
}








?>