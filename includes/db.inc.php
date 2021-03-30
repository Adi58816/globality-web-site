<?php


// подключаемся в базе данных
function open_table() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "programming_hub_login_system";
    $mysql = new mysqli($host, $username, $password, $db);
    return $mysql;
}

function close_db($mysql) {
    $mysql->close();
}