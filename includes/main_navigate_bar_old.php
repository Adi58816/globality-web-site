style

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">GLOB</a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload_story.php">Upload Your Story</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_stories.php">My stories</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="chat.php">Chat</a>
       </li>
        <li class="nav-item">
          <a class="nav-link" href="clear_user_cookie.php">Quit</a>
        </li>
        <?php
            if ($_COOKIE["user"] == "adisalimgereev") {
                echo <<<"EOT"
                <li class="nav-item">
                <a class="nav-link" href="admin_panel.php">👑 Admin panel</a>
                </li>
                EOT;
            }
        ?>

      </form>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav> 


