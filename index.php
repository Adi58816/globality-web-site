<?php
	include "templates.php";
	include "includes/check_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MAIN PAGE</title>
</head>
<script></script>
<body>
	<?php
		include "includes/main_navigate_bar.php";
		include "includes/bootstrap.php";
		include "includes/dark_mode.php";
		include "includes/db.inc.php";
		include "includes/check_login.php";
		include "includes/config.php";

		// открываем бд
		$mysql = open_table();

		// выделяем все статьи отсортированные по id в обратном порядке
		$req = $mysql->query("SELECT * FROM stories ORDER BY `id` DESC");
	?>

	<style>
		div.container {
			text-align: center;
			border: 1px solid black;
			border-radius: 10px;
			margin-left: 10px;
			margin-right: 10px;
			width: 75%;
			margin-left: 12.5%;
		}
	</style>

	<?php while ($result = $req->fetch_assoc()) { ?>
		<div class="container">
		<!-- название -->
		<h1><?php echo $result["title"] ?> <br></h1>
		<!-- описание -->
		<h4><?php echo $result["description"] ?> <br></h4>
		by 
		<!-- если пользователь админ то выводим его красным цветом -->
		<?php 
			if ($result["author"] == $ADMIN_LOGIN) {
				echo "<b style='color: red;'>👑 adisalimgereev</b>";
			} else {
				echo $result["author"];
			}
		
		?> <br> 
		<!-- кнопка которая перенаправляет на страницу для чтения историй -->
		<a href="story.php?id=<?php echo $result["id"] ?>"><button class="btn btn-success btn-sm">READ</button></a>
		<!-- если пользователь администратор то у него есть некоторый контроль над историями -->
		<?php if ($_COOKIE["user"] == $ADMIN_LOGIN) { ?>	
			<!-- удалить историю -->
			<a href="delete_story.php?id=<?php echo $result["id"] ?>"><button class="btn btn-danger btn-sm">👑 DELETE</button></a>
			<!-- изменить историю -->
			<a href="change_story.php?id=<?php echo $result["id"] ?>">
			<button class="btn btn-danger btn-sm">👑 CHANGE</button>
			</a>
			<!-- забанить автора истории -->
			<a href="ban_user.php?login=<?php echo $result["author"] ?>">
			<button class="btn btn-danger btn-sm">👑 BAN AUTHOR</button>
			</a>
		<?php } ?>
		</div> <br>
	<?php } ?>

</body>
</html>
