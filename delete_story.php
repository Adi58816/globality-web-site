<?php

include "includes/db.inc.php";
include "includes/check_login.php";

// получаем id истории из ссылки
$id = $_GET["id"];

// открываем базу данных
$mysql = open_table();

// получаем историю с данным id 
$q = $mysql->query("SELECT * FROM `stories` WHERE `id`='$id'");
$result = $q->fetch_assoc();

// проверяем пользователя на админа
if ($_COOKIE["user"] == "adisalimgereev") {
	$mysql->query("DELETE FROM `stories` WHERE `id`='$id'");
	close_db($mysql);
	header("Location: index.php");
}

// проверяем является ли пользователей автором истории
if ($result["author"] != $_COOKIE["user"]) {
    echo $result["author"];
    exit("Вы не автор истории!");
}

// удаляем историю из базы данных
$mysql->query("DELETE FROM `stories` WHERE `id`='$id'");

// перенаправляем пользователя на страницу со списком его историй
header("Location: my_stories.php");

// закрываюм базу данных
close_db($mysql);