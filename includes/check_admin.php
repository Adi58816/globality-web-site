<?php

include "includes/config.php";

if ($_COOKIE["user"] != $ADMIN_LOGIN) {
    header("Location: index.php");
}