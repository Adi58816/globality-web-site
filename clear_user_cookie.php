<?php

// убираем значение user, чтобы выйти из аккаунта
setcookie("user", "", time() - 3600);

// перенаправляем пользователя на страницу входа в аккаунт
header("Location: login.php");