<?php
include "includes/check_login.php";
include "includes/db.inc.php";
include "includes/check_login.php";

// получаем id истории
$id = $_GET["id"];

// открываем базу данных
$mysql = open_table();

// получаем историю по id и записываем в словарь story
$q = $mysql->query("SELECT * FROM `stories` WHERE `id`='$id'");
$story = $q->fetch_assoc();


?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CHANGE STORY PAGE</title>
</head><body>
<?php
    include "includes/bootstrap.php";
    include "includes/main_navigate_bar.php";
    include "includes/dark_mode.php";
    include "includes/bootstrap.php";
    include "includes/center_form.php";
    include "includes/check_login.php";
?> <br>
<form action="change_story_to_db.php?id=<?php echo $story["id"]; ?>" method="post">
<!-- название истории -->
Title: 
<br> 
<input type="text" name="name" value="<?php echo $story["title"]; ?>"> 
<br>
<!-- описание -->
Description: <br> 
<textarea name="description" id="name" cols="30" rows="2" value=""><?php echo $story["description"]; ?></textarea> 
<br>
<!-- текст -->
Text: <br> <textarea name="story" id="name" cols="30" rows="10" value=""><?php echo $story["story"]; ?></textarea> 
<br><input multiple type="file" name="files[]">
<br> <br>
<button class="btn btn-success">Upload</button>
</form>
</body></html>


<?php
// закрываем базу данных
close_db($mysql);
?>