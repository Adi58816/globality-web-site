<?php include "templates.php"; ?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><title>
REGISTRATION PAGE</title>
<?php 
	include "includes/bootstrap.php";
	include "includes/dark_mode.php";
?>
</head>
<body><style>
	form {
			text-align: center;
		}
	</style>
<form action="auth.php" method="post">Введите ваш новый логин: <br>
<input type="text" name="login"> <br>Введите ваш новый пароль: <br>
<input type="password" name="password"> <br> Введите вашу почту: <br>
<input type="email" name="email"> <br><br><button type="submit" 
class="btn btn-success btn-sm">СОХРАНИТЬ</button> <br> <br>
</form>	
</body></html>