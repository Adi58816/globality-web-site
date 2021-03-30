<?php
	include "includes/db.inc.php";

	// получаем логин и пароль введенный пользователем и фильтруем
	$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

	// получаем хэш пароля
	$password = md5($password);
	
	$mysql = open_table();

	// выделяем в базе данных пользователя у которого этот логин
	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' ");

	// записываем этот результат в переменную user
	$user = $result->fetch_assoc();

	// проверяем пароль на правильность
	if ($user["password"] != $password) {
		echo "Неверный логин или пароль!";
		exit();
	}

	// оставляем имя пользователя в файлах куки
	setcookie('user', $login, time() + 3600 * 24);

	// перенаправляем пользователя на главную страницу
	header("LOCATION: index.php");

	exit();
	close_db($mysql);
?>