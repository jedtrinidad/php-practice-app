<!doctype html>
<html>
  <head>
    <title>Login|drizzle-torrential news</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
     <header>
       <center>
         <h1>drizzle.</h1>
       </center>
     </header>
     <form method="post">
       <table align="center">
         <tr>
           <td>Username</td>
           <td><input type="text" name="uname"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="pwd"></td>
         </tr>
         <tr>
           <td>
             <nav>
               <ul>
                 <li><input type="submit" name="login" value="Login" class="button"></li>
               </ul>
             </nav>
          </td>
         </tr>
       </table>
     </form>
     <?php
     function dataCleaner($data){
       $data = stripcslashes($data);
       return $data;
     }

     if(isset($_POST['login'])){
       include('connection.php');
       session_start();
       $uname = dataCleaner($_POST['uname']);
       $pwd = dataCleaner($_POST['pwd']);
       $sql = "SELECT * FROM user_tbl WHERE uname = '$uname' AND pwd = '$pwd'";

       if($rows = mysqli_query($conn, $sql)){

         if(mysqli_num_rows($rows) == 1){
           $_SESSION['login_user'] = $uname;
           header("location: profile.php");

         }
         else{
           echo "<script> window.alert('Username or Password is invalid!');</script>";
         }

        $conn->close();
       }
     }
      ?>
      <footer>
        <a href="index.php" class="button">Back to Home</a>
      </footer>
  </body>
</html>
