<?php
	include "templates.php";
	include "includes/dark_mode.php";
	include "includes/bootstrap.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN PAGE</title>
</head>
<body>
	<style>
		form {
			text-align: center;
		}
	</style>
	<form action="check_login.php" method="post">
	Введите ваш логин: <br>
	<input type="text" name="login"> <br>
	Введите ваш пароль: <br>
	<input type="password" name="password"> <br> <br>
	<button type="submit" class="btn btn-success btn-sm">ВОЙТИ</button> <br> <br>
	Еще не зарегистрировался? <a href="registration.php">Зарегистрируйся!</a>
	</form>
</body>
</html>