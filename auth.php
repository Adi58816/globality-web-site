<?php
// функция для проверки правильности email
function validateEmail($email) {
	$emailIsValid = FALSE;
	if (!empty($email))
	{
			$domain = ltrim(stristr($email, '@'), '@') . '.';
			$user   = stristr($email, '@', TRUE);
			if (!empty($user) && !empty($domain) && checkdnsrr($domain)) {
				$emailIsValid = TRUE;
			}
	}
	return $emailIsValid;
}	

// получаем логин и пароль введенный пользователем и фильтруем
$login = filter_var(trim($_POST["login"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);

if (!validateEmail($email)) {
	echo "Неверный email!";
	exit();
}

// подключаемся в базе данных
$mysql = new mysqli('localhost', 'root', '', 'programming_hub_login_system');

// получаем всех пользователей у которых этот логин
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user = $result->fetch_assoc();

// если количество не равно нулю, то есть пользователь с таким логином
if (is_countable($user)) {
	echo "Такой пользователь уже существует!";
	exit();
}

// получаем всех пользователей у которых этот email
$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$user = $result->fetch_assoc();

// если количество не равно нулю, то есть пользователь с таким email
if (is_countable($user)) {
	echo "Данная почта уже зарегистрированна!";
	exit();
}

// проверяем логин и пароль на правильность
if (mb_strlen($login) < 4) {
	echo "Логин слишком маленький!";
	exit();
} 
if (mb_strlen($login) > 20) {
	echo "Логин слишком большой!";
	exit();
}
if (mb_strlen($password) < 4) {
	echo "Слишком маленький пароль!";
	exit();
} 

// получаем хэш пароля
$password = md5($password);

// записываем значения логина и пароля в базу данных
$mysql->query("INSERT INTO `users` (`login`, `password`, `email`) VALUES('$login', '$password', '$email')");
$mysql->close();

// добавляем в файлы куки почту
setcookie("email", $email, time() + 3600 * 24);

// перенаправляем пользователя на страницу регистрации
header("LOCATION: email_captcha.php");
?>