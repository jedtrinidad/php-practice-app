<?php
session_start();
 ?>
 <!--Userpage-->
<!doctype html>
<html>
  <head>
    <title><?php echo $_SESSION['login_user'];?>|drizzle-torrential news</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <center>
        <h1>drizzle.</h1><a href="logout.php" class="button">Logout</a>
      </center>
    </header>
    <h1 id="greet">
      <center>
        Hello there,<br> <?php echo $_SESSION['login_user'];?>
      </center>
    </h1>
    <footer>
    </footer>
  </body>
</html>
