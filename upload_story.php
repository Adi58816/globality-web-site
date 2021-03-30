<?php if ($_COOKIE["user"] == "") {header("Location: login.php");}
?><!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UPLOAD STORY PAGE</title>
</head><body>
<?php
    include "includes/bootstrap.php";
    include "includes/main_navigate_bar.php";
    include "includes/dark_mode.php";
    include "includes/bootstrap.php";
    include "includes/center_form.php";
    include "includes/check_login.php";
?> <br>
<form action="upload_story_to_db.php" method="post">
Title: <br> <input type="text" name="name" value="Unnamed"> <br>
Description: <br> <textarea name="description" id="name" cols="30" rows="2" value="">
No description provided</textarea> <br>
Text: <br> <textarea name="story" id="name" cols="30" rows="10" value=""></textarea> <br><input multiple type="file" name="files[]">
<br> <br>
<button class="btn btn-success">Upload</button>
</form>
</body></html>
