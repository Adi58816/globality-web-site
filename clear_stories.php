<?php

include "includes/db.inc.php";
include "includes/check_login.php";
include "includes/check_admin.php";


// открываем бд
$mysql = open_table();

// удаляем все истории из бд
$mysql->query("DELETE FROM `stories` WHERE 1");

// закрываем бд
close_db($mysql);

// переводим админа в админ панель
header("Location: admin_panel.php");