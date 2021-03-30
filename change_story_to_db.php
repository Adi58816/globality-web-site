<?php
include "includes/check_login.php";
include "includes/db.inc.php";
include "includes/config.php";

// получаем id истории
$id = $_GET["id"];

$mysql = open_table();
$query = $mysql->query("SELECT * FROM `stories` WHERE `id`='$id'");
$result = $query->fetch_assoc();


function change_story($mysql) {
    // получаем id истории
    $id = $_GET["id"];

    // получаем историю по id из бд
    $query = $mysql->query("SELECT * FROM `stories` WHERE `id`='$id'");
    $result = $query->fetch_assoc();

    // получаем название, описание, текст и автора
    $title = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
    $story = filter_var(trim($_POST["story"]), FILTER_SANITIZE_STRING);
    $author = $result["author"];

    // удаляем предыдущую версию истории
    $mysql->query("DELETE FROM `stories` WHERE `id`='$id'");

    // записываем в базу данных новые значения
    $mysql->query("INSERT INTO `stories` (`id`, `time`, `title`, `description`, `story`, `author`) VALUES('$id', CURRENT_TIMESTAMP, '$title', '$description', '$story', '$author')");
}

// если пользователь админ, то он может все изменять
if ($_COOKIE["user"] == $ADMIN_LOGIN) {
    change_story($mysql);
}

// если пользователь автор истории, то он может все изменять
if ($_COOKIE["user"] == $result["author"]) {
    change_story($mysql);
}

// перенаправляем пользователя на страницу пользователей
header("Location: my_stories.php");