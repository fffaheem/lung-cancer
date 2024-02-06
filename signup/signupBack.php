<?php


include "../partials/conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $confirmPassword = $conn->real_escape_string($confirmPassword);

    if($name == "" || $name == NULL){
        echo "Name field cannot be empty";
        exit;
    }

    if($email == "" || $email == NULL){
        echo "Email field cannot be empty";
        exit;
    }

    if($password == "" || $password == NULL){
        echo "Password field cannot be empty";
        exit;
    }

    if($password != $confirmPassword){
        echo "Password doesn't match";
        exit;
    }

    $sql = "SELECT * FROM `users` where `email` = '$email'";
    $res = $conn->query($sql);
    $aff = $conn->affected_rows;

    if($aff > 0){
        echo "Email already exist";
        exit;
    }


    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`name`,`email`,`password`)
            VALUES ('$name','$email','$passwordHash')";

    $res = $conn->query($sql);
    $aff = $conn->affected_rows;

    if($aff > 0){
        echo "success";
    }else{
        echo "Some problem occured please try again later";
    }

    exit;
}

?>