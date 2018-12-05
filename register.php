<!--Registration Page-->
<!doctype html>
<html>
  <head>
    <title>Registration|drizzle-torrential news</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    include('connection.php');
    ?>
    <?php
    //Variables
    $fname = $mname = $lname = $gender = $bdate = $contact=
    $email = $address = $uname = $pass = "";
    $fullname = "";
    //Error Variables
    $nameError = $genderError = $bdateError = $cnError = $emailError = "";
    $addressError = "";
    $unameError = $pwdError = "";
     ?>
     <header>
       <?php
       //Makes Sure that the server is using the POST method
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          //Name Inputs
          if(empty($_POST['fname'])||empty($_POST['mname'])||empty($_POST['lname'])){
            $nameError = "Please fillout the name field.";
          }
          else{
            $fname = nameRegex(dataCleaner($_POST['fname']));
            $mname = nameRegex(dataCleaner($_POST['mname']));
            $lname = nameRegex(dataCleaner($_POST['lname']));
          }

          //Gender input
          if(empty($_POST['gender'])){
            $genderError = "Please Select a gender";
          }
          else{
            $gender = $_POST['gender'];
          }

          //Birthdate input
          if(empty($_POST['bdate'])){
            $bdateError = "Please put your Birthdate";
          }
          else{
            $bdate = $_POST['bdate'];
          }

          //Contact numbers Input
          if(empty($_POST['contact'])){
            $cnError = "Please fill out the contact no.";
          }
          else{
            $contact = contactNoRegex(dataCleaner($_POST['contact']));
          }

          //Email Input
          if(empty($_POST['email'])){
            $emailError = "Please fill in the email field.";
          }
          else{
            $email = dataCleaner($_POST['email']);
          }

          //Address Input
          if(empty($_POST['address'])){
            $addressError = "Please fill in the address field";
          }
          else{
            $address = dataCleaner($_POST['address']);
          }

          //Username
          if(empty($_POST['uname'])){
            $unameError = "Please write a username";
          }
          else{
            $uname = dataCleaner($_POST['uname']);
          }
          if(empty($_POST['pwd'])){
            $pwdError = "Please put in a Password";
          }
          else{
            $pass = pwdRegex($_POST['pwd']);
          }

        }// Dont put any functions inside

        //Remove Injection!
        function dataCleaner($input){
          $input = trim($input);
          $input = stripcslashes($input);
          $input = htmlspecialchars($input);
          return $input;
        }

        //Regex like a boss
        function nameRegex($NAME){  //For names
          if(preg_match("/^[a-zA-Z_ -]+$/",dataCleaner($NAME))){
            return $NAME;
          }
          else{
            global $nameError;
            $nameError = "Invalid Input";
            //return $nameError;
          }
        }

        function contactNoRegex($_CN){  //For numbers
          if(preg_match("/^[0-9]+$/",dataCleaner($_CN))){
            return $_CN;
          }
          else{
            global $cnError;
            $cnError = "Invalid Input";
            //return $cnError;
          }
        }

        function pwdRegex($_PWD){
          if(preg_match("/[a-zA-Z0-9]{8,}/",dataCleaner($_PWD))){
            return $_PWD;
          }
          else{
            global $pwdError;
            $pwdError = "Password must contain a combination of 8 or more alphanumeric characters.";
            //return $cnError;
          }
        }
        ?>
       <center>
         <h1>drizzle.</h1>
       </center>
     </header>
     <center>
       <h1>Register your account.</h1>
    </center>
    <form method="post" action="register.php">
      <table align="center">
        <tr>
          <td>Firstname</td>
          <td><input type="text" name="fname"
            value="<?php echo $fname;?>"></td>
        </tr>
        <tr>
          <td>Middlename</td>
          <td><input type="text" name="mname"
            value="<?php echo $mname;?>"></td>
        </tr>
        <tr>
          <td>Lastname</td>
          <td><input type="text" name="lname"
            value="<?php echo $lname;?>">
            <br><?php echo $nameError;?>
          </td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>
            <input type="radio" name="gender" value="Male"
            <?php if($gender == "Male"){ echo "checked";};?>>Male
            <br>
            <input type="radio" name="gender" value="Female"
            <?php if($gender == "Female"){ echo "checked";};?>>Female
            <br><?php echo $genderError;?>
          </td>
        </tr>
        <tr>
          <td>Birthday</td>
          <td><input type="date" name="bdate"
            value="<?php echo $bdate;?>">
            <br><?php echo $bdateError;?>
          </td>
        </tr>
        <tr>
          <td>Contact Number</td>
          <td><input type="tel" name="contact"
            value="<?php echo $contact;?>">
            <br><?php echo $cnError;?>
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email"
            value="<?php echo $email;?>">
            <br><?php echo $emailError;?>
          </td>
        </tr>
        <tr>
          <td>Home Address</td>
          <td><input type="text" name="address"
            value="<?php echo $address;?>">
            <br><?php echo $addressError;?>
          </td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="uname"
            value="<?php echo $uname;?>">
            <br><?php echo $unameError;?>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="pwd"
            value="<?php echo $pass;?>">
            <br><?php echo $pwdError;?>
          </td>
        </tr>
        <tr>
          <td>
            <span>
              <input type="submit" value="Register Account" class="button"
              onclick="return confirm('Are you sure?')">
            </span>
          </td>
        </tr>
      </table>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if(!empty($pass)&&!empty($uname)&&!empty($fname)&&!empty($mname)&&
      !empty($lname)&&!empty($gender)&&!empty($bdate)&&!empty($contact)&&
      !empty($email)&&!empty($address)){
echo<<<HTML
      <header align="center">
      <h1 align="center">Congratulations</h1>
      </header>
      <table align="center">
      <tr>
        <td>Username</td><td>$uname</td>
      </tr>
      <tr>
        <td>Fullname</td><td>$fname $mname $lname</td>
      </tr>
      <tr>
        <td>Gender</td><td>$gender</td>
      </tr>
      <tr>
        <td>Birthday</td><td>$bdate</td>
      </tr>
      <tr>
        <td>Email</td><td>$email</td>
      </tr>
      <tr>
        <td>Contact Number</td><td>$contact</td>
      </tr>
      <tr>
        <td>Address</td><td>$address</td>
      </tr>
      </table>
HTML;
      $sql = "INSERT INTO user_tbl(fname,mname,lname,gender,bday,contact,email,address,uname,pwd) VALUES ('$fname','$mname','$lname','$gender','$bdate','$contact','$email','$address','$uname','$pass')";
      if(mysqli_query($conn, $sql)){
        echo "<script>window.alert('You are successfully registered!');</script>";
      }
      else{
        echo "Error".mysqli_error($conn);
      }

      }
    }
     ?>
     <footer>
       <a href="index.php" class="button">Back to Home</a>
     </footer>
  </body>
</html>
