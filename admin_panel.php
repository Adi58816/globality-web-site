<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>
    <?php
        include "includes/main_navigate_bar.php";
        include "includes/bootstrap.php";
        include "includes/dark_mode.php";
        include "includes/check_admin.php";
        include "includes/db.inc.php";
        
        // открываем базу данных
        $mysql = open_table();

        // получаем всех пользователей в базе данных
        $result = $mysql->query("SELECT * FROM users");
    ?>
    <style>
        /* центрируем все */
        body {
            text-align: center;
        }
    </style>
    <?php
        echo "Список пользователей:" . "<br>";
        while ($value = $result->fetch_assoc()) { ?>
            <!-- блок с кнопкой для удаления пользователя из баззы данных -->
            <p><?php echo $value["login"] ?></p>
            <a href="ban_user.php?login=<?php echo $value["login"]; ?>">
            <button class="btn  btn-danger btn-sm">УДАЛИТЬ</button>
            </a>
       <?php }?>


    <?php
        // закрываем базу данных
        close_db($mysql);
    ?>
</body>
</html>