<?php

$showAlert = false;
$showError = false;
$exists = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $sql = "select * from users where username = '$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 0){
        if(($password == $cpassword) && $exists == false){
           // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            if($result) {
                $showAlert = true;
            }
            else{
                $showError = "Password do not match";

            }
            
        }
       if($num>0){
           $exists = "Username not available";
       }
    
    }
}
?>

<!doctype html>
<html>
    <head>
        <Title>Signup</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>  
<body>
<div class="Nav">
<ul>
  <li><a class="active" href="index.html">Login</a></li>
  <li><a href="signup.php">Sign Up</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <p id="Ptag">IndianGovtPortal</p>
</ul>
    </div>

    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong>Your account is now created and you can login.
        <button  type="button" class="close">
        <span>+</span>
        </button></div>';
    }
    if($showError){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'. $showError.'
        <button  type="button" class="close">
        <span>+</span>
        </button></div>';
    }
    if($exists){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'. $exists.'
        <button  type="button" class="close">
        <span>+</span>
        </button></div>';
    }
?>

<div class="container" id="frm">
<h1 id="Lg">Signup here</h1>

<form action="signup.php" method="POST">
    <div class="form-group" id="Lg">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username">
    </div><br>
    <div class="form-group" id="Lg">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" placeholder="Enter Password">
    </div><br>
    <div class="form-group" id="lo">
        C Password <input type="text" id="cpassword" name="cpassword" placeholder="Enter Confirm Password">
    </div><br>
    <button type="submit" id="bty">signup</button><br>
<Br>
    <a href="index.html">                       Have An Account?</a>

</form>
</div>
<footer id="Ft">
@2020 made by Raghunandan Jha
</footer>
</body>
</html>