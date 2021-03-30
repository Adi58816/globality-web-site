<?php
include "includes/db.inc.php";
include "includes/check_login.php";
include "includes/check_admin.php";
include "includes/config.php";

// открываем базу данных
$mysql = open_table();

// получаем логин человека которого надо забанить
$login = $_GET["login"];

// если человек является админом сайта его нельзя забанить 
if ($login == $ADMIN_LOGIN) {
    echo "<script>alert('Вы не можете его забанить');</script>";
} else {
	// удаляем пользователя из базы данных
    $mysql->query("DELETE FROM users WHERE `login`='$login'");
    // удаляем все истории пользователя из баззы данных
    $mysql->query("DELETE FROM stories WHERE `author`='$login'");
}

// закрываем базу данных
$mysql->close();

// перенаправляем пользователя в админ панель
if ($login != $ADMIN_LOGIN) {
    header("Location: admin_panel.php");
}
?>