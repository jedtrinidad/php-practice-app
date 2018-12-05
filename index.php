<?php
session_start();
if(isset($_SESSION['login_user'])){
  header("location: profile.php");
}
 ?>
<!--Homepage-->
<!--Please run drizzle_db.sql first-->
<!doctype html>
<html>
  <head>
    <title>drizzle-torrential news</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <center>
        <h1>drizzle.</h1>
      </center>
    </header>
    <h1 id="greet">
      <center>Hello there,<br>stranger!</center>
    </h1>
    <center>
      <nav align="center">
        <a href="login.php" class="button">Existing User? Login</a>
        <br>
        <a href="register.php" class="button">New Here? Register for an account.</a>
      </nav>
    </center>
    <footer>
    </footer>
  </body>
</html>
