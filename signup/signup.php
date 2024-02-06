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
    <title>Cancer Prediction | Signup</title>
</head>
<body>
    
    <?php   include "../partials/navbar.php";  ?>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Sign-up</h2>
        </div>

        <div id="liveAlertPlaceholder"></div>

        <form class="my-5" id="form">

            <div class="mb-3">

                <div class="input-group">
                    <span class="input-group-text">Full Name</span>
                    <input type="text" class="form-control" name="name" id="name" required>
                  </div>
            </div>


            <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text">Email Address</span>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text">Password</span>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text">Confirm Password</span>
                  <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                </div>
            </div>
              

            <button type="submit" id="btn" class="btn btn-primary">Sign up</button>
        </form>

        <p>Already a member? <a href="../login/login.php" class="link-success">Log in</a></p>


    </div>




</body>
<script src="./signup.js"></script>
</html>