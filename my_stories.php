<?php
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
        <?php if ($result["author"] == $_COOKIE["user"]) { ?>
		<div class="container">
		<!-- название -->
		<h1><?php echo $result["title"] ?> <br></h1>
		<!-- описание -->
		<h4><?php echo $result["description"] ?> <br></h4>
		<!-- выделение администратора сайта -->
		by <?php 
			if ($result["author"] == $ADMIN_LOGIN) {
				echo "<b style='color: red;'>👑 adisalimgereev</b>";
			} else {
				echo $result["author"];
			}
		
		?> <br> 
		<!-- чтение истории -->
		<a href="story.php?id=<?php echo $result["id"] ?>"> <button class="btn btn-success btn-sm">READ</button> </a>
		<!-- удаление истории -->
		<a href="delete_story.php?id=<?php echo $result["id"] ?>"> <button class="btn btn-danger btn-sm">DELETE</button> </a>
		<!-- изменение истории -->
		<a href="change_story.php?id=<?php echo $result["id"] ?>"> <button class="btn btn-danger btn-sm">CHANGE</button> </a>
		<br> <br> 
		</div> <br> 
        <?php } ?>
	<?php } ?>

</body>
</html>
