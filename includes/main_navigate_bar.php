
<style>
    button {
        margin-left: 0px;
    }
    button.btn {
        margin-bottom: 5px;
        margin-top: 5px;
        margin-left: 5px;
    }

</style>


<ul class="nav nav-tabs">
<li>&nbsp;&nbsp;</li>
    <li>
    <a href="index.php"><button class="btn btn-primary btn-sm">Home</button></a><br>
    </li>&nbsp;
    <li>
    <a href="clear_user_cookie.php"><button class="btn btn-primary btn-sm">QUIT</button></a><br>
     </li> &nbsp;
     <li> 
    <a href="my_stories.php"><button class="btn btn-primary btn-sm">MY STORIES</button></a><br>
     </li>
     &nbsp;
     <li> 
    <a href="upload_story.php"><button class="btn btn-primary btn-sm">UPLOAD STORY</button></a><br>
     </li>&nbsp;
     <?php
            if ($_COOKIE["user"] == "adisalimgereev") { ?>
     <li> 
    <a href="admin_panel.php"><button class="btn btn-primary btn-sm">👑 Admin panel</button></a><br>
     </li> &nbsp;<li> 
    <a href="db_panel.php?id=2" target="_blank"><button class="btn btn-primary btn-sm">👑 Stories db</button></a><br>
     </li> &nbsp;<li> 
    <a href="db_panel.php?id=1" target="_blank"><button class="btn btn-primary btn-sm">👑 Users db</button></a><br>
     </li> &nbsp;
     <li> 
    <a href="clear_stories.php"><button class="btn btn-primary btn-sm">👑 Clear stories</button></a><br>
     </li> &nbsp;<li> 
    <a href="admin_panel.php"><button class="btn btn-primary btn-sm">👑 Clear users</button></a><br>
     </li> &nbsp;<li> 
    <a href="admin_panel.php"><button class="btn btn-primary btn-sm">👑 Clear all database</button></a><br>
     </li> &nbsp;
    <?php } ?>

      <a href="chat.php"><button class="btn btn-primary btn-sm">CHAT</button></a><br>
</ul>