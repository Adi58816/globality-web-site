<?php

// получаем дату
$date = time();
// название
$title = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
// описание
$description = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
// текст
$story = filter_var(trim($_POST["story"]), FILTER_SANITIZE_STRING);
// и автора
$login = $_COOKIE["user"];

include "includes/db.inc.php";
include "includes/check_login.php";

// открываем бд
$mysql = open_table();

// записываем в result последнюю историю
$req = $mysql->query("SELECT * FROM stories ORDER BY `id` DESC");
$result = $req->fetch_assoc();
/*
...
последняя статья, id=899
пользователь -> загрузить статью -> "супер новая статья", id=899+1=900
*/
$id = $result["id"] + 1;

// загружаем историю в бд
$mysql->query("INSERT INTO `stories` (`id`, `time`, `title`, `description`, `story`, `author`) VALUES('$id', CURRENT_TIMESTAMP, '$title', '$description', '$story', '$login')");

// выводим дату (для дебага)
echo $date;

// закрываем бд
close_db($mysql);

// перенаправляем пользователя на главную страницу
header("Location: index.php");