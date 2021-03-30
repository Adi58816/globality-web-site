<?php

include "includes/db.inc.php";
include "includes/check_login.php";
include "includes/check_admin.php";
include "includes/config.php";


// открываем бд
$mysql = open_table();

// удаляем всех пользователей кроме админа
$mysql->query("DELETE FROM `users` WHERE `login` != '$ADMIN_LOGIN'");

// закрываем бд
close_db($mysql);

// перенаправляем админа в админ панель
header("Location: admin_panel.php");