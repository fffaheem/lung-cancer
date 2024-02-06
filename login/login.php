<?php

include "../partials/conn.php";
session_start();
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["email"]) ){
    header("location: ../index.php");
    exit;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../partials/links.php"; ?>
    <title>Document</title>
</head>
<body>
    
    <?php   include "../partials/navbar.php";  ?>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Log-in</h2>
        </div>

        <div id="liveAlertPlaceholder"></div>

        <form class="my-5" id="form">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" id="btn" class="btn btn-primary">Log in</button>
        </form>

        <p>Not a member? <a href="../signup/signup.php" class="link-success">Sign up</a></p>


    </div>

</body>
<script src="./login.js"></script>
</html>