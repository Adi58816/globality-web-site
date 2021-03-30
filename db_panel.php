<?php

$id = $_GET["id"];

if ($id == 2) {
	header("Location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=programming_hub_login_system&table=stories&pos=0");
} else if ($id == 1) {
	header("Location: http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=programming_hub_login_system&table=users&pos=0");
} 