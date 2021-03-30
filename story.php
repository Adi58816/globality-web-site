<?php
// получаем id истории
$id = $_GET["id"];
?>
<body>
<?php
    include "includes/main_navigate_bar.php";
    include "includes/dark_mode.php";
    include "includes/bootstrap.php";
    include "includes/center_form.php";
    include "includes/db.inc.php";
    include "includes/check_login.php";
?> <br>
<style>
    body {
        text-align: center;
    }
</style>
    <?php
        $mysql = open_table();
        $r = $mysql->query("SELECT * FROM `stories` WHERE `id`='$id'");
        $result = $r->fetch_assoc();
        // выводим содержимое истории
        echo $result["title"] . "<br>";
        echo $result["description"] . "<br>";
        echo $result["story"] . "<br>";
        close_db($mysql);
    ?>
</body></html>
